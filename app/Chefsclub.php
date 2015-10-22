<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chefsclub extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chefsclub';

    public $timestamps = false;

    public static function getTipoCozinhaForSelect() 
    {
        return array("Delivery", "Novidades", "Afrodisíaca", "Alemã", "Americana", "Árabe", "Argentina", "Australiana", "Baiana ", "Batataria", "Belga", "Brasileira", "Bruschetteria", "Cafeteria", "Carnes", "Casual Dinning", "Chinesa", "Churrascaria", "Comidinhas", "Confeitaria", "Contemporânea", "Creperia", "Espanhola", "Francesa", "Frutos do Mar", "Fusion Cuisine", "Galeteria", "Grill", "Hamburgueria", "Havaiana", "Indiana", "Internacional", "Italiana", "Japonesa", "Judaica", "Libanesa", "Mediterrânea", "Mexicana", "Mineira", "Nordestina", "Parrilla", "Peruana", "Pizzaria", "Portuguesa", "Quitanda", "Russa", "Saudável", "Slow Food", "Sorveteria", "Steakeria", "Tailandesa ", "Tex-Mex", "Variada", "Vegetariana");
    }

    public static function getDescontoForSelect() 
    {
        return self::distinct()->select('desconto')->get();
    }
}
