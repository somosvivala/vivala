<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Command para facilitar o update da documentação da vivalá
 *
 * @todo: conseguir chama-lo no scheduler para automatizar a atualização
 * da documentação
 */
class UpdateDocumentacao extends Command
{

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'documentacao:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Atualiza a documentacao da vivalá';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
    {
        /* Gerando a documentacao usando do apigen */
        system('apigen generate --source app --destination ../vivala-docs --title Vivalá');

        /* Mostrando output no console */
        $this->info('Documentação atualizada com sucesso :) ');

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
		];
	}

}
