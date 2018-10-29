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
* WorkflowMap model definition.
* 
* @author 
*/
class WorkflowMap extends Model  
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    const TABLE = 'workflow_map';

    /**
     * The database table column used by the model.
     *
     * @var string
     */
    const ID = 'id';
    const USER_ID = 'user_id';
    const WORKFLOW_ID = 'workflow_id';
    const STATUS = 'status';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::USER_ID,
        self::WORKFLOW_ID,
        self::STATUS
    ];

}