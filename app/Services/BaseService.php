<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class BaseService
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        $record = $this->model->find($id);
        if (!$record) {
            throw new HttpException(404, 'Not Found resource');
        }
        return $record;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->model->find($id);
        
        if (!$record) {
            throw new HttpException(404, 'Not Found resource');
        }

        $record->update($data);
        
        return $record;
    }

    public function delete($id,$deletedBy)
    {
       $record = $this->model->find($id);
        
        if (!$record) {
            throw new \Exception('Resource not found', 404);
        }

        $record->deleted_by = $deletedBy;
        $record->save();
        $record->delete();
        
        return true;
    }
}