<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Model
 * @package    Lumen
 * 
 */

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

/**
* User model definition.
* 
* @author 
*/
class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

     /**
     * The database table used by the model.
     *
     * @var string
     */
    const TABLE = 'users';

    /**
     * The database table column used by the model.
     *
     * @var string
     */
    const ID = 'id';
    const EMAIL = 'email';
    const PHONE = 'phone';
    const IS_VERIFIED='is_verified';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::EMAIL,
        self::PHONE,
        self::IS_VERIFIED
    ];  
}
