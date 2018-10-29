<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Controller Class
 * @package    Lumen
 * 
 */

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\Entities\Error\ErrorRepository;
use App\Repositories\Entities\User\RegisterRepository;

/**
 * The Register controller is responsible to register a user into a system.
 */
class RegisterController extends Controller
{
    /**
     * @var App\Repositories\Entities\User\RegisterRepository
     */
    protected $RegisterRepository;

    /**
     * @author 
     * 
     * @param App\Repositories\Entities\User\RegisterRepository $User
     * @param App\Repositories\Entities\Error\ErrorRepository $Error
     *
     * @return void
     */
    public function __construct(RegisterRepository $User, ErrorRepository $Error)
    {
        $this->RegisterRepository = $User;
        $this->ErrorRepository = $Error;

        parent::__construct($User, $Error);
    }

    /**
     * @author 
     * 
     * @param Request $Request
     * 
     * @return array
     */
    public function validateRequest($Request)
    {
        $validator = Validator::make($Request->all(), config('rules.v1.register'), trans('messages.v1.register'));
        if ($validator->fails()) {
            return $validator->errors();
        } 
    }
}
