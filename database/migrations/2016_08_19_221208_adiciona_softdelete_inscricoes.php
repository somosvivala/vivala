<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaSoftdeleteInscricoes extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscricao_experiencias', function(Blueprint $table)
        {
            //inserindo a coluna deleted_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscricao_experiencias', function(Blueprint $table)
        {
            //dropando a coluna deleted_at
            $table->dropSoftDeletes();
        });
    }

}
