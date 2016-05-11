<?php namespace App\Repositories;

use App\Interfaces\LoggerRepositoryInterface;

class LoggerRepository extends LoggerRepositoryInterface
{

    //implementando metodo da interface
    public function saveLog($logObj)
    {
        echo "inside saveLog() \n";
        var_dump($logObj);
    }
}
