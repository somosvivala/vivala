<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use \DB as DB;

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

    public static function getQuantidadeForSelect() 
    {
        return array(
            ['id' => 1, 'text'=>'1 adulto'],
            ['id' => 2, 'text'=>'2 adultos'],
            ['id' => 3, 'text'=>'3 adultos'],
            ['id' => 4, 'text'=>'4 adultos'],
            ['id' => 5, 'text'=>'5 adultos'],
            ['id' => 6, 'text'=>'6 adultos'],
            ['id' => 7, 'text'=>'7 adultos'],
            ['id' => 8, 'text'=>'8 adultos'],
            ['id' => 9, 'text'=>'9 adultos'],
            ['id' => 10, 'text'=>'10 adultos']
        );
    }

    public static function getCidadeForSelect()
    {
        return array(
            ['id' => 2,  'cidade' => 'Rio de Janeiro',              'estado' => 'RJ'],
            ['id' => 3,  'cidade' => 'Porto Alegre',                'estado' => 'RS'],
            ['id' => 4,  'cidade' => 'Baixada Fluminense',          'estado' => 'RJ'],
            ['id' => 5,  'cidade' => 'Brasília',                    'estado' => 'DF'],
            ['id' => 7,  'cidade' => 'Niteroi',                     'estado' => 'RJ'],
            ['id' => 10, 'cidade' => 'Belo Horizonte',              'estado' => 'MG'],
            ['id' => 12, 'cidade' => 'Balneário Camburiú e Região', 'estado' => 'SC'],
            ['id' => 13, 'cidade' => 'São Paulo',                   'estado' => 'SP'],
            ['id' => 14, 'cidade' => 'Curitiba',                    'estado' => 'PR'],
            ['id' => 15, 'cidade' => 'Salvador',                    'estado' => 'BA'],
            ['id' => 18, 'cidade' => 'Ribeirão Preto',              'estado' => 'SP'],
            ['id' => 20, 'cidade' => 'Florianópolis',               'estado' => 'SC'],
            ['id' => 21, 'cidade' => 'Fortaleza',                   'estado' => 'CE'],
            ['id' => 22, 'cidade' => 'Recife',                      'estado' => 'PE'],
            ['id' => 23, 'cidade' => 'Joinville',                   'estado' => 'SC'],
            ['id' => 24, 'cidade' => 'Criciúma',                    'estado' => 'SC'],
            ['id' => 25, 'cidade' => 'Vitória e Região',            'estado' => 'RJ'],
            ['id' => 27, 'cidade' => 'Goiânia',                     'estado' => 'GO'],
            ['id' => 29, 'cidade' => 'Campinas',                    'estado' => 'SP']
        );
    }

    public static function getRestaurant($filters)
    {
        $params = array(
            'nome'     => null,
            'date'     => null,
            'time'     => null,
            'city'     => null,
            'type'     => null,
            'quantity' => null,
            'promo'    => null,
            'page'     => 1
        );
        $params = array_merge($params, $filters);

        $query =  DB::table('chefsclub');

        if (isset($params['nome'])) {
            $query->where('restaurante', 'like', "%{$params['nome']}%");
        }
        if (isset($params['date'])) {
            $query->where('horario', 'like', "%{$params['date']}%");
        }
        if (isset($params['time'])) {
            $query->whereRaw("'{$params['time']}'::time BETWEEN horario_abre AND horario_fecha");
        }
        if (isset($params['city']) && $params['city'] > 0) {
            $query->where('codigo_cidade', $params['city']);
        }
        if (isset($params['type'])) {
            $query->where('tipo_cozinha', 'like', "%{$params['type']}%");
        }
        if (isset($params['quantity']) && $params['quantity'] > 0) {
            $query->havingRaw("(SUBSTRING(chefsclub.beneficio, '([0-9])')::integer + 1) >= {$params['quantity']}");
        }
        if (isset($params['promo'])) {
            $query->where('desconto', 'like', "%{$params['promo']}%");
        }

        return $query->groupBy('id')->get();
    }

    public static function getHorarios() {
        $start = '09:00:00';
        $end = '23:30:00';
        $time = strtotime($start);
        $timeStop = strtotime($end);

        while($time<$timeStop) {
            $datas[] = date('H:i', $time);
            $time = strtotime('+30 minutes', $time);
        }
        return $datas;
    }
}
