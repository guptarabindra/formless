<?php 
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Model
 * @package    Lumen
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
* Workflow model definition.
* 
* @author 
*/
class Workflow extends Model  
{
    /**
     * Override table name from model
     * 
     * @var string
     */
    protected $table='workflow';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    const TABLE = 'workflow';

    /**
     * The database table column used by the model.
     *
     * @var string
     */
    const ID = 'id';
    const NAME = 'name';
    const NOMENCLATURE = 'nomenclature';
    const RETRY_COUNT = 'retry_count';
    const IS_MANDATORY = 'is_mandatory';
    const ORDER = 'order';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME,
        self::NOMENCLATURE,
        self::RETRY_COUNT, 
        self::IS_MANDATORY,
        self::ORDER
    ];
}