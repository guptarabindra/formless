<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Controller Class
 * @package    Lumen
 * 
 */

namespace App\Http\Controllers;

use DB;
use log;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\Entities\Api\APIRepository;
use App\Repositories\Entities\Error\ErrorRepository;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Repositories\Exceptions\ObjectNotLoadedException;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * The Abstract controller defines the body of the CRUD methods.
 */
abstract class Controller extends BaseController
{
    /**
     * @var App\Repositories\Entities\Api\APIRepository
     */
    protected $APIRepository;

    /**
     * @var App\Repositories\Entities\Error\ErrorRepository
     */
    protected $ErrorRepository;

    /**
     * @author 
     * 
     * @param App\Repositories\Entities\Api\APIRepository $API
     * @param App\Repositories\Entities\Error\ErrorRepository $Error
     *
     * @return void
     */
    public function __construct(APIRepository $API, ErrorRepository $Error)
    {
        $this->APIRepository = $API;
        $this->ErrorRepository = $Error;
    }

    /**
     * The post request creates a new resource
     * @author 
     * 
     * @param  Request $Request
     * 
     * @return string
     */
    public function post(Request $Request)
    {  
    	if ($errors = $this->validateRequest($Request)) {
    		return $this->ErrorRepository->errorMessage(ErrorRepository::HTTP_BAD_REQUEST, $errors->toArray());
        }

        DB::beginTransaction();
        try {
            $Response = $this->APIRepository->create($Request->all());
            if (!$Response instanceof Model) throw new ObjectNotLoadedException();
            DB::commit();
        } catch(Exception $Exception) {
            Log::error($Exception->getTraceAsString());
            DB::rollBack();

            return $this->ErrorRepository->errorMessage(ErrorRepository::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $this->APIRepository->dispatchResponse(
            trans('messages.v1.success'),
            Response::HTTP_CREATED,
            $this->APIRepository->getResourceName(),
            $this->APIRepository->transformResponse($Response, $this->APIRepository->getTransformClass())); 
    }

    /**
     * This routine will validate the incoming request.
     * @author 
     * 
     * @param  Request $Request
     * 
     * @return array
     */
    abstract protected function validateRequest($Request);
}
