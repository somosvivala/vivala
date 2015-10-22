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

    public static function getCidadeForSelect()
    {
        return array(
            array('id' => 2,  'cidade' => 'Rio de Janeiro',              'estado' => 'RJ'),
            array('id' => 3,  'cidade' => 'Porto Alegre',                'estado' => 'RS'),
            array('id' => 4,  'cidade' => 'Baixada Fluminense',          'estado' => 'RJ'),
            array('id' => 5,  'cidade' => 'Brasília',                    'estado' => 'DF'),
            array('id' => 7,  'cidade' => 'Niteroi',                     'estado' => 'RJ'),
            array('id' => 10, 'cidade' => 'Belo Horizonte',              'estado' => 'MG'),
            array('id' => 12, 'cidade' => 'Balneário Camburiú e Região', 'estado' => 'SC'),
            array('id' => 13, 'cidade' => 'São Paulo',                   'estado' => 'SP'),
            array('id' => 14, 'cidade' => 'Curitiba',                    'estado' => 'PR'),
            array('id' => 15, 'cidade' => 'Salvador',                    'estado' => 'BA'),
            array('id' => 18, 'cidade' => 'Ribeirão Preto',              'estado' => 'SP'),
            array('id' => 20, 'cidade' => 'Florianópolis',               'estado' => 'SC'),
            array('id' => 21, 'cidade' => 'Fortaleza',                   'estado' => 'CE'),
            array('id' => 22, 'cidade' => 'Recife',                      'estado' => 'PE'),
            array('id' => 23, 'cidade' => 'Joinville',                   'estado' => 'SC'),
            array('id' => 24, 'cidade' => 'Criciúma',                    'estado' => 'SC'),
            array('id' => 25, 'cidade' => 'Vitória e Região',            'estado' => 'RJ'),
            array('id' => 27, 'cidade' => 'Goiânia',                     'estado' => 'GO'),
            array('id' => 29, 'cidade' => 'Campinas',                    'estado' => 'SP')
        );
    }
}
