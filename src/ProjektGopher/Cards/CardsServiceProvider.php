<?php namespace ProjektGopher\Cards;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class CardsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	public function boot()
	{
		$this->package('projekt-gopher/cards');
		AliasLoader::getInstance()->alias('Card', 'ProjektGopher\Cards\Card');
		AliasLoader::getInstance()->alias('Deck', 'ProjektGopher\Cards\Deck');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}