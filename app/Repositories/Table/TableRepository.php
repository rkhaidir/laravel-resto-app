<?php

namespace App\Repositories\Table;

use LaravelEasyRepository\Repository;

interface TableRepository extends Repository{

    public function getTablePaginate($paginate);
    public function getTableById($id);
    public function createTable(array $newTable);
    public function updateTable(array $updateTable, $id);
    public function deteleTable($id);
}
