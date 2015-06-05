<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PrettyUrl extends Model {

	//mass assigned fields
	protected $fillable = [
		'url',
		'tipo'
	];


	public function prettyurlable() 
	{
		 return $this->morphTo();
	}


	/**
	 * Testa essa url está disponivel, se nao estiver devolve ela + timestamps
	 * @return  String         $url  ||   $url + current timestamp
	 */
	public function giveAvailableUrl($url=null) {

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

	public static function getPrettyUrlFor($obj) {
		if (!$obj) {
			return 'wrong_object';
		} else {
			dd($obj);
			return PrettyUrl::all()->where('prettyurlable_id', $obj->id)->first()->url;
		}

	}





}
