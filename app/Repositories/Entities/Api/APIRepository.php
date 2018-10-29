<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Repository Class
 * @package    Lumen
 */

namespace App\Repositories\Entities\Api;

use Helpers;
use Exception;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\BlankDataException;
use App\Repositories\Contracts\IApi;
use App\Repositories\Entities\Api\APIRepository;
use App\Repositories\Transformers\UserTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * The APIRepository class creates and sends the api response
 */
abstract class APIRepository implements IApi
{
    /**
     * This routine will provide resource name of the resource.
     * @author 
     * 
     * @return string
     */
    abstract protected function getResourceName();

    /**
     * This routine will provide classname from which we are transforming our response.
     * @author 
     * 
     * @return string
     */
    abstract protected function getTransformClass();

    /**
     * The dispatchResponse method is using to create response structure.
     * @author 
     *
     * @param string $status
     * @param int $code
     * @param string $key (OPTIONAL)
     * @param array $messages (OPTIONAL)
     * 
     * @return string
     */
    public function dispatchResponse(string $status, int $code, string $key = '', array $messages = [])
    {
        $response = [
            APIRepository::STATUS => $status,
            APIRepository::CODE => $code,
        ];

        if ($code === 200 || $code === 201) {
            $response[APIRepository::DATA] = $messages;
            $response[APIRepository::RESOURCE] = $key;
          } else {
            unset($response[APIRepository::DATA]);
            unset($response[APIRepository::RESOURCE]);
            $response[APIRepository::ERRORS] = $messages;
        }

        return response()->json(array_filter($response), $code);
    }

    /**
     * The transformResponse methos is using to transform response.
     * @author 
     * 
     * @param Illuminate\Database\Eloquent\Model $Data
     * @param string $transformer
     * 
     * @return array
     */
    public function transformResponse(Model $Data, $transformer)
    {
        if (!$Data->count()) {
            return new BlankDataException('Data is empty');
        }

        return (new $transformer)->transform($Data);
    }
}