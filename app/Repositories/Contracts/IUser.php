<?php 
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Interface
 * @package    Lumen
 */

namespace App\Repositories\Contracts;

/**
 * The IUser interface creates user constraints.
 */
interface IUser
{
    const USER_RESOURCE = 'user';
    const ID = 'id';
    const EMAIL = 'email';
    const PHONE = 'phone';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}