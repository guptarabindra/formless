<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Controller Class
 * @package    Lumen
 * 
 */

namespace App\Repositories\Entities\Error;

use ReflectionClass;

/** 
 * The ErrorRepository class is responsible to respond all Error.
 *
 * @author 
 */
class ErrorRepository
{
    const HTTP_NO_CONTENT             = 204;
    const HTTP_MOVED_PERMANENTLY      = 301;
    const HTTP_NOT_MODIFIED           = 304;
    const HTTP_BAD_REQUEST            = 400;
    const HTTP_UNAUTHORIZED           = 401;
    const HTTP_FORBIDDEN              = 403;
    const HTTP_NOT_FOUND              = 404;
    const HTTP_METHOD_NOT_ALLOWED     = 405;
    const HTTP_REQUEST_TIMEOUT        = 408;
    const HTTP_UNSUPPORTED_MEDIA_TYPE = 415;
    const HTTP_UNPROCESSABLE_ENTITY   = 422;
    const HTTP_TOO_MANY_REQUESTS      = 429;
    const HTTP_INTERNAL_SERVER_ERROR  = 500;
    const HTTP_BAD_GATEWAY            = 502;
    const HTTP_SERVICE_UNAVAILABLE    = 503;
    const HTTP_GATEWAY_TIMEOUT        = 504;

   /**
    * List of status codes.
    * 
    * @var array
    */
    public static $statusCodes = [
        204 => 'No Content',
        301 => 'Moved Permanently',
        304 => 'Not Modified',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        408 => 'Request Timeout',
        415 => 'Unsupported Media Type',
        422 => 'Unprocessable Entity',
        429 => 'Too Many Requests',
        500 => 'Internal Server Error',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout'
    ];

    /**
     * The getClassConstantName method is providing errorCodeName using errorCode.
     * @author 
     *
     * @param int $code
     * 
     * @return string
     */
    private function getClassConstantName($code) 
    {
        $ErrorClass = new ReflectionClass(__CLASS__);
        $constants = $ErrorClass->getConstants();
        $constantName = null;
        foreach ($constants as $name => $value) {
            if ($value == $code) {
                $constantName = $name;
                break;
            }
        }

        return $constantName;
    }

    /**
     * The errorMessage method is using to create error response structure.
     * @author 
     *
     * @param int $code
     * @param array $errors (OPTIONAL)
     * 
     * @return string
     */
    public function errorMessage(int $code, $errors = []) 
    {
        $response = [
            'status' => trans('messages.v1.failed') 
        ];
        $error_all=[];

        if (array_key_exists($code,self::$statusCodes)) {
            $response['code'] = $code;
        }
        
        if (is_array($errors) && !empty($errors)) {
            foreach ($errors as $error) {
                $error_all = array_merge($error_all, $error); 
            } 
            $response['errors'] = $error_all;
        } else {
            $error_all[]=['type' => $this->getClassConstantName($code), 'message' => self::$statusCodes[$code]];
            $response['errors'] = $error_all;
        }

        return response()->json($response, $code);
    }
}