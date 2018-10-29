<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Interface
 * @package    Lumen
 */

namespace App\Repositories\Contracts;

/**
 * The IApi interface creates common constraints for RESTfull API.
 */
interface IApi
{
    const CODE = 'code';
    const RESOURCE_URL = 'resource_url';
    const RESOURCE_TYPE = 'resource_type';
    const STATUS = 'status';
    const RESOURCE = 'resource';
    const DATA = 'data';
    const ERRORS = 'errors';
}
