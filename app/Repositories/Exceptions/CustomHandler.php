<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Repository Exception Class
 * @package    Lumen
 * 
 */

namespace App\Repositories\Exceptions;

use Exception;
use App\Repositories\Exception\BlankDataException;
use App\Repositories\Exception\ObjectNotLoadedException;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Repositories\Entities\Error\ErrorRepository;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

/** 
 * Custom repository exception handler.
 *
 * @author 
 */
class CustomHandler extends ExceptionHandler
{
    /**
     * @var App\Repositories\Entities\Error\ErrorRepository
     */
    protected $ErrorRepository;

    /**
     * @author 
     * 
     * @param App\Repositories\Entities\Error\ErrorRepository $Error
     */
    public function __construct(ErrorRepository $Error)
    {
        $this->ErrorRepository = $Error;
    }

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     * @author 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $Exception
     * 
     * @return App\Repositories\Entities\Error\ErrorRepository
     */
    public function render($request, Exception $Exception)
    {
        $status = ErrorRepository::HTTP_INTERNAL_SERVER_ERROR;
        if ($Exception instanceof HttpResponseException) {
          $status = ErrorRepository::HTTP_INTERNAL_SERVER_ERROR;

        } elseif ($Exception instanceof MethodNotAllowedHttpException) {
          $status = ErrorRepository::HTTP_METHOD_NOT_ALLOWED;
          $Exception = new MethodNotAllowedHttpException([], 'HTTP_METHOD_NOT_ALLOWED', $Exception);

        } elseif ($Exception instanceof NotFoundHttpException) {
          $status = ErrorRepository::HTTP_NOT_FOUND;
          $Exception = new NotFoundHttpException('HTTP_NOT_FOUND', $Exception);

        } elseif ($Exception instanceof AuthorizationException) {
          $status = ErrorRepository::HTTP_FORBIDDEN;
          $Exception = new AuthorizationException('HTTP_FORBIDDEN', $status);

        } elseif ($Exception instanceof \Dotenv\Exception\ValidationException && $Exception->getResponse()) {
          $status = ErrorRepository::HTTP_BAD_REQUEST;
          $Exception = new \Dotenv\Exception\ValidationException('HTTP_BAD_REQUEST', $status, $Exception);

        } elseif ($Exception instanceof BlankDataException) {
          $status = ErrorRepository::HTTP_INTERNAL_SERVER_ERROR;
          $Exception = new BlankDataException('HTTP_INTERNAL_SERVER_ERROR', $Exception);

        } elseif ($Exception instanceof ObjectNotLoadedException) {
          $status = ErrorRepository::HTTP_UNPROCESSABLE_ENTITY;
          $Exception = new ObjectNotLoadedException('HTTP_UNPROCESSABLE_ENTITY', $Exception);

        } elseif ($Exception) {
          $Exception = new HttpException($status, 'HTTP_INTERNAL_SERVER_ERROR');
        }

       return $this->ErrorRepository->errorMessage($status);
    }
}