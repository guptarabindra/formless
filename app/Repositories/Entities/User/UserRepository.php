<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Repository Class
 * @package    Lumen
 * 
 */

namespace App\Repositories\Entities\User;

use App\Model\User;
use App\Repositories\Contracts\IUser;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\Entities\Api\APIRepository;
use App\Repositories\Contracts\IRepository;

/**
 * The UserRepository performs CRUD of a user into a system.
 */
class UserRepository extends APIRepository implements IUser, IRepository
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
     * @var App\Repositories\Transformers\UserTransformer
     */
    protected $transformer = UserTransformer::class; 

    /**
     * The update method is responsible to update user.
     * @author 
     *
     * @param array $attributes
     * @param int $id
     */
    public function update(array $attributes, int $id)
    {

    }

    /**
     * The all method is responsible to get all users.
     * @author 
     *
     * @param array $columns
     */
    public function all($columns = ['*'])
    {

    }

    /**
     * The find method is responsible to get a user.
     * @author 
     *
     * @param int $id
     * @param array $columns
     *
     * @return string
     */
    public function find(int $id, $columns = ['*'])
    {

    }

    /**
     * The delete method is responsible to delete a user.
     * @author 
     *
     * @param array $ids
     */
    public function delete(array $ids)
    {

    }

}
