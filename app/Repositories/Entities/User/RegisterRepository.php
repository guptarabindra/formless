<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Repository Class
 * @package    Lumen
 * 
 */

namespace App\Repositories\Entities\User;

use Exception;
use App\Model\User;
use App\Repositories\Contracts\IUser;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\Entities\Api\APIRepository;
use App\Repositories\Transformers\UserTransformer;
use App\Repositories\Exceptions\BlankDataException;
use App\Repositories\Exceptions\ObjectNotLoadedException;

/** 
 * The RegisterRepository register a user into a system.
 *
 * @author 
 */
class RegisterRepository extends APIRepository implements IUser
{
    /**
     * @var App\Model\User
     */
    protected $User;

    /**
     * @author 
     *
     * @param App\Model\User $User
     *
     * @return void
     */
    public function __construct(User $User)
    {
        $this->User = $User;
    }

    /**
     * The create method creates user instance.
     * @author 
     *
     * @param array $attributes
     *
     * @return string
     * @throws App\Repositories\Exceptions\BlankDataException
     * @throws App\Repositories\Exceptions\ObjectNotLoadedException
     */
    public function create(array $attributes)
    {
        if(empty($attributes)) throw new BlankDataException();

        $User = $this->User->create($attributes);
        if (!$User instanceof User) throw new ObjectNotLoadedException(); 

        return $User;
    } 

    /**
     * This method provides the resource name of the resource.
     * @author 
     * 
     * @return string
     */
    public function getResourceName()
    {
        return self::USER_RESOURCE;
    }

    /**
     * This method returns the classname from which we are transforming our response.
     * @author 
     * 
     * @return string
     */
    public function getTransformClass()
    {
        return UserTransformer::class;
    }
}
