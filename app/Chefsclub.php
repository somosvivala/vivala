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
            ['id' => 2,  'cidade' => 'Rio de Janeiro',              'estado' = 'RJ'],
            ['id' => 3,  'cidade' => 'Porto Alegre',                'estado' = 'RS'],
            ['id' => 4,  'cidade' => 'Baixada Fluminense',          'estado' = 'RJ'],
            ['id' => 5,  'cidade' => 'Brasília',                    'estado' = 'DF'],
            ['id' => 7,  'cidade' => 'Niteroi',                     'estado' = 'RJ'],
            ['id' => 10, 'cidade' => 'Belo Horizonte',              'estado' = 'MG'],
            ['id' => 12, 'cidade' => 'Balneário Camburiú e Região', 'estado' = 'SC'],
            ['id' => 13, 'cidade' => 'São Paulo',                   'estado' = 'SP'],
            ['id' => 14, 'cidade' => 'Curitiba',                    'estado' = 'PR'],
            ['id' => 15, 'cidade' => 'Salvador',                    'estado' = 'BA'],
            ['id' => 18, 'cidade' => 'Ribeirão Preto',              'estado' = 'SP'],
            ['id' => 20, 'cidade' => 'Florianópolis',               'estado' = 'SC'],
            ['id' => 21, 'cidade' => 'Fortaleza',                   'estado' = 'CE'],
            ['id' => 22, 'cidade' => 'Recife',                      'estado' = 'PE'],
            ['id' => 23, 'cidade' => 'Joinville',                   'estado' = 'SC'],
            ['id' => 24, 'cidade' => 'Criciúma',                    'estado' = 'SC'],
            ['id' => 25, 'cidade' => 'Vitória e Região',            'estado' = 'RJ'],
            ['id' => 27, 'cidade' => 'Goiânia',                     'estado' = 'GO'],
            ['id' => 29, 'cidade' => 'Campinas',                    'estado' = 'SP']
        );
    }
}
