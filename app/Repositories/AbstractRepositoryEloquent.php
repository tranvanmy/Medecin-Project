<?php

namespace App\Repositories;

abstract class AbstractRepositoryEloquent
{
    abstract public function model();

    public function make($with = null)
    {
        return $this->model->with($with);
    }

    public function all($with = [], $select = null)
    {
        return $this->make($with)->get($select);
    }

    public function paginate($paginate, $with = [], $select = null)
    {
        return $this->make($with)->paginate($paginate, $select);
    }

    public function find($id, $with = null, $select = null)
    {
        return $this->make($with)->find($id);
    }

    public function create($data = [])
    {
        return $this->model()->create($data);
    }

    public function update($id, $data = [])
    {
        if ($a = $this->find($id, [], ['id'])) {
            return $a->update($data);
        }

        return false;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function deleteItem($data = [])
    {
        return $this->model->destroy($data);
    }
}
