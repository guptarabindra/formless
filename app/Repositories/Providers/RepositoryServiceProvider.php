<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Repository Provider Class
 * @package    Lumen
 * 
 */

namespace App\Repositories\Providers;

use League\Fractal\Manager;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Serializer\DataSerializer;
use App\Repositories\Entities\User\UserRepository;
use App\Repositories\Exceptions\CustomHandler;
use Illuminate\Contracts\Debug\ExceptionHandler;

/**
 * The RepositoryServiceProvider clas binds classes and interfaces one another.
 */
class RepositoryServiceProvider extends ServiceProvider 
{
	/**
	 * @author 
	 *
	 * @return void 
	 */
	public function register()
	{
		$this->app->bind(
			'App\Repositories\Contracts\IApi', 
			'App\Repositories\Entities\Api\APIRepository'
		);
		
		$this->app->bind(
			'App\Repositories\Contracts\IUser',
			'App\Repositories\Entities\User\RegisterRepository',
			'App\Repositories\Entities\User\UserRepository'
		);
	}

	/**
	 * @author 
	 *
	 * @return void 
	 */
	public function boot()
	{
		$this->app->bind(
		    ExceptionHandler::class,
		    CustomHandler::class
		); 
	}	
}
