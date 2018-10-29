<?php
/**
 * Laravel Framework Lumen (5.7.1) (Laravel Components 5.7.*)
 *
 * @category   Repository Interface
 * @package    Lumen
 */

namespace App\Repositories\Contracts;

/**
 * IRepository interface provides the standard functions declaration of repository.
 */
interface IRepository
{
    /**
     * The all routine will help us to get all records based on pagination.
     * @author 
     *
     * @param int $page
     * @param array $columns (OPTIONAL)
     */
    public function all(int $page, $columns = ['*']);

    /**
     * The find routine will help us to find a record.
     * @author 
     *
     * @param int $id
     * @param array $columns (OPTIONAL)
     */
    public function find(int $id, $columns = ['*']);

    /**
     * The delete routine will help us to delete a record.
     * @author 
     *
     * @param array $ids
     */
    public function delete(array $ids);

     /**
     * The create routine will help us to create a record.
     * @author 
     *
     * @param array $attributes
     */
    public function create(array $attributes);

    /**
     * The update routine will help us to update a record.
     * @author 
     *
     * @param array $attributes
     * @param int $id
     */
    public function update(array $attributes, int $id);

}
