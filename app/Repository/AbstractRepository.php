<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected $model;

    protected abstract function getClassName(): string;

    protected function getModel(): Model
    {
        if (!$this->model) {
            $className = $this->getClassName();
            $this->model = new $className;
        }

        return $this->model;
    }

    public function findAll()
    {
        return $this->getModel()->all();
    }

    public function paginate(int $limit = 15)
    {
        return $this->getModel()
            ->orderBy('id', 'DESC')
            ->paginate($limit);
    }

    public function find(int $id)
    {
        return $this->getModel()->find($id);
    }

    public function create(array $data)
    {
        return $this->getModel()->create($data);
    }
}
