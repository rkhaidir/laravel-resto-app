<?php

namespace App\Services\Table;

use LaravelEasyRepository\Service;
use App\Repositories\Table\TableRepository;
use Illuminate\Support\Facades\Log;

class TableServiceImplement extends Service implements TableService{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;

  public function __construct(TableRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  /**
   * Get table paginate
   * 
   */
  public function getTablePaginate()
  {
    try {
      return $this->mainRepository->getTablePaginate(7);
    } catch (\Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }

  /**
   * Get table by id
   * 
   * @param int $id
   */
  public function getTableById($id)
  {
    try {
      return $this->mainRepository->getTableById($id);
    } catch (\Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }

  /**
   * Create new table
   * 
   * @param $request
   */
  public function createNewTable($request)
  {
    $data = $request->validated();
    try {
      return $this->mainRepository->createTable($data);
    } catch (\Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }

  /**
   * Update table
   * 
   * @param $request
   * @param int $id
   */
  public function updateTable($request, $id)
  {
    $data = $request->validated();
    try {
      return $this->mainRepository->updateTable($data, $id);
    } catch (\Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }

  /**
   * Delete table
   * 
   * @param int $id
   */
  public function deleteTable($id)
  {
    $this->mainRepository->deteleTable($id);

    try {
      return TRUE;
    } catch (\Exception $e) {
      Log::error($e->getMessage());
      return FALSE;
    }
  }
}
