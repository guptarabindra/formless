<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Repository Transform Class
 * @package    Lumen
 * @copyright  
 */ 

namespace App\Repositories\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * The CommonTransformer class is extending from TransformerAbstract.

 */
class Transformer extends TransformerAbstract
{
    /**
     * Accessor Method to convert created_at timestamp into ISO8601
     * @author 
     *
     * @param timestamp $createdAt
     * @return string
     */
    public function getCreatedAtAttribute($createdAt) {
        $date = new \Carbon\Carbon($createdAt);
        return $date->toIso8601String();
    }

    /**
    * Accessor Method to convert updated_at timestamp into ISO8601
    * @author 
    *
    * @param timestamp $updatedAt
    * @return string
    */
    public function getUpdatedAtAttribute($updatedAt) {
        $date = new \Carbon\Carbon($updatedAt);
        return $date->toIso8601String();
    }
}
