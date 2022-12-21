<?php

namespace App\Services\Table;

use LaravelEasyRepository\BaseService;

interface TableService extends BaseService{

  public function getTablePaginate();
  public function getTableById($id);
  public function createNewTable($request);
  public function updateTable($request, $id);
  public function deleteTable($id);
}
