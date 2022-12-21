<?php

namespace App\Repositories\Table;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Table;

class TableRepositoryImplement extends Eloquent implements TableRepository{

  /**
  * Model class to be used in this repository for the common methods inside Eloquent
  * Don't remove or change $this->model variable name
  * @property Model|mixed $model;
  */
  protected $model;

  public function __construct(Table $model)
  {
    $this->model = $model;
  }

  /**
   * Get table paginate
   * 
   * @param int $paginate
   */
  public function getTablePaginate($paginate)
  {
    return $this->model->select('id' ,'name', 'guest_number', 'status', 'location')->paginate($paginate);
  }

  /**
   * Get table paginate
   * 
   * @param int $id
   */
  public function getTableById($id)
  {
    return $this->model->findOrFail($id);
  }

  /**
   * Get table paginate
   * 
   * @param array $newTable
   */
  public function createTable(array $newTable)
  {
    return $this->model->create($newTable);
  }

  /**
   * Get table paginate
   * 
   * @param array $updateTable
   * @param int $id
   */
  public function updateTable(array $updateTable, $id)
  {
    return $this->model->where('id', $id)->update($updateTable);
  }

  /**
   * Get table paginate
   * 
   * @param int $id
   */
  public function deteleTable($id)
  {
    return $this->model->where('id', $id)->delete();
  }
}
