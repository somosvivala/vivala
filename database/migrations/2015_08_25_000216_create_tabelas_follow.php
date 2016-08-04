<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelasFollow extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		/**
		 * Relacoes perfil seguindo outra entidade 
		*/
		
			Schema::create('perfil_follow_perfil', function(Blueprint $table)
			{
				$table->integer('perfil_seguidor_id')->unsigned()->index();
				$table->foreign('perfil_seguidor_id')
					->references('id')
					->on('perfils')
					->onDelete('cascade');

				$table->integer('perfil_seguido_id')->unsigned()->index();
				$table->foreign('perfil_seguido_id')
					->references('id')
					->on('perfils')
					->onDelete('cascade');

				$table->timestamps();
			});

			Schema::create('perfil_follow_empresa', function(Blueprint $table)
			{
				$table->integer('perfil_seguidor_id')->unsigned()->index();
				$table->foreign('perfil_seguidor_id')
					->references('id')
					->on('perfils')
					->onDelete('cascade');

				$table->integer('empresa_seguido_id')->unsigned()->index();
				$table->foreign('empresa_seguido_id')
					->references('id')
					->on('empresas')
					->onDelete('cascade');

				$table->timestamps();
			});

			Schema::create('perfil_follow_ong', function(Blueprint $table)
			{
				$table->integer('perfil_seguidor_id')->unsigned()->index();
				$table->foreign('perfil_seguidor_id')
					->references('id')
					->on('perfils')
					->onDelete('cascade');

				$table->integer('ong_seguido_id')->unsigned()->index();
				$table->foreign('ong_seguido_id')
					->references('id')
					->on('ongs')
					->onDelete('cascade');

				$table->timestamps();
			});

		/**
		 * Relacoes ong seguindo outra entidade
		*/
			Schema::create('ong_follow_perfil', function(Blueprint $table)
			{
				$table->integer('ong_seguidor_id')->unsigned()->index();
				$table->foreign('ong_seguidor_id')
					->references('id')
					->on('ongs')
					->onDelete('cascade');

				$table->integer('perfil_seguido_id')->unsigned()->index();
				$table->foreign('perfil_seguido_id')
					->references('id')
					->on('perfils')
					->onDelete('cascade');

				$table->timestamps();
			});

			Schema::create('ong_follow_empresa', function(Blueprint $table)
			{
				$table->integer('ong_seguidor_id')->unsigned()->index();
				$table->foreign('ong_seguidor_id')
					->references('id')
					->on('ongs')
					->onDelete('cascade');

				$table->integer('empresa_seguido_id')->unsigned()->index();
				$table->foreign('empresa_seguido_id')
					->references('id')
					->on('empresas')
					->onDelete('cascade');

				$table->timestamps();
			});

			Schema::create('ong_follow_ong', function(Blueprint $table)
			{
				$table->integer('ong_seguidor_id')->unsigned()->index();
				$table->foreign('ong_seguidor_id')
					->references('id')
					->on('ongs')
					->onDelete('cascade');

				$table->integer('ong_seguido_id')->unsigned()->index();
				$table->foreign('ong_seguido_id')
					->references('id')
					->on('ongs')
					->onDelete('cascade');

				$table->timestamps();
			});

		/**
		 * Relacoes empresa seguindo outra entidade
		*/
			Schema::create('empresa_follow_perfil', function(Blueprint $table)
			{
				$table->integer('empresa_seguidor_id')->unsigned()->index();
				$table->foreign('empresa_seguidor_id')
					->references('id')
					->on('empresas')
					->onDelete('cascade');

				$table->integer('perfil_seguido_id')->unsigned()->index();
				$table->foreign('perfil_seguido_id')
					->references('id')
					->on('perfils')
					->onDelete('cascade');

				$table->timestamps();
			});

			Schema::create('empresa_follow_empresa', function(Blueprint $table)
			{
				$table->integer('empresa_seguidor_id')->unsigned()->index();
				$table->foreign('empresa_seguidor_id')
					->references('id')
					->on('empresas')
					->onDelete('cascade');

				$table->integer('empresa_seguido_id')->unsigned()->index();
				$table->foreign('empresa_seguido_id')
					->references('id')
					->on('empresas')
					->onDelete('cascade');

				$table->timestamps();
			});

			Schema::create('empresa_follow_ong', function(Blueprint $table)
			{
				$table->integer('empresa_seguidor_id')->unsigned()->index();
				$table->foreign('empresa_seguidor_id')
					->references('id')
					->on('empresas')
					->onDelete('cascade');

				$table->integer('ong_seguido_id')->unsigned()->index();
				$table->foreign('ong_seguido_id')
					->references('id')
					->on('ongs')
					->onDelete('cascade');

				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empresa_follow_ong');
		Schema::drop('empresa_follow_empresa');
		Schema::drop('empresa_follow_perfil');
		
		Schema::drop('ong_follow_ong');
		Schema::drop('ong_follow_empresa');
		Schema::drop('ong_follow_perfil');

		Schema::drop('perfil_follow_ong');
		Schema::drop('perfil_follow_empresa');
		Schema::drop('perfil_follow_perfil');
	}

}
