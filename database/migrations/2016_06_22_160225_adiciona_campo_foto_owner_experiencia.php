<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaCampoFotoOwnerExperiencia extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fotos', function(Blueprint $table)
        {
            $table->boolean('foto_owner_experiencia')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fotos', function(Blueprint $table)
        {
            $table->dropColumn('foto_owner_experiencia');
        });
    }

}
