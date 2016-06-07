<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PrettyUrl extends Model
{

    //mass assigned fields
    protected $fillable = [
        'url',
        'tipo'
    ];


    /**
     * Uma prettyUrl pode ser de varias entidades diferentes,
     * por isso é uma relacao polimorfica
     */
    public function prettyurlable()
    {
        return $this->morphTo();
    }


    /**
     * Testa essa url está disponivel, se nao estiver devolve ela + timestamps
     * @return  String         $url  ||   $url + current timestamp
     */
    public function giveAvailableUrl($url=null)
    {

        if(!$url) {
            $url = '';
        }

        $url = strtolower($url);

        if (PrettyUrl::all()->where("url", $url)->first()) {
            return $url . Carbon::now()->getTimestamp();
        } else {
            return $url;
        }
    }


    /**
     * ??? @todo grep + remove
     */
    public static function getPrettyUrlFor($obj)
    {
        if (!$obj) {
            return 'wrong_object';
        } else {
            dd($obj);
            return PrettyUrl::all()->where('prettyurlable_id', $obj->id)->first()->url;
        }

    }


    /**
     * Metodo para criar uma nova instancia de PrettyUrl, ainda nao persistida
     * no BD, e nao associada a nenhuma entidade.
     *
     * @param $nome - o nome do perfil que sera usado para criar a url
     * @return Uma instancia de PrettyUrl com a url especificada;
     */
    public static function getURLParaPerfil($nome)
    {
        $novaURL = new PrettyUrl();
        $novaURL->url = str_replace(" ", "", $nome) . '_' . Carbon::now()->getTimestamp();
        $novaURL->tipo = 'usuario';

        return $novaURL;
    }




}
