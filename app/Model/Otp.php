<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Model
 * @package    Lumen
 * 
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
* OTP model definition.
* 
* @author 
*/
class Otp extends Model  
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    const TABLE = 'otp';

    /**
     * The database table column used by the model.
     *
     * @var string
     */
    const ID = 'id';
    const PHONE = 'phone';
    const OTP = 'otp';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::PHONE,
        self::OTP
    ];

}