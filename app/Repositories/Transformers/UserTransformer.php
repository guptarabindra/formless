<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Repository Transform Class
 * @package    Lumen
 * 
 */ 

namespace App\Repositories\Transformers;

use App\Model\User;
use App\Repositories\Contracts\IApi;
use App\Repositories\Contracts\IUser;
use App\Repositories\Transformers\Transformer;

/**
 * The UserTransformer class transform the response for the API
 * 
 * @author
 */
class UserTransformer extends Transformer implements IApi, IUser
{
    /**
     * The tranform method is using for Fractal transformer.
     * @author 
     * 
     * @param App\Model\User $User
     * 
     * @return array
     */
    public function transform(User $User)
    {
        return [
            IUser::ID => $User->id,
            IUser::EMAIL => $User->email,
            IUser::PHONE => $User->phone,
            IUser::CREATED_AT => $this->getCreatedAtAttribute((string) $User->created_at),
            IUser::UPDATED_AT => $this->getUpdatedAtAttribute((string) $User->updated_at),
            IApi::RESOURCE_TYPE=>IUser::USER_RESOURCE,
            IApi::RESOURCE_URL => route('user_resource',['id'=>$User->id])
        ];
    }
}
