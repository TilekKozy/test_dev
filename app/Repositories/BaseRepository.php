<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class BaseRepository implements BaseInterface
{
    protected Model $model;

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param integer $id
     * @return Model
     *
     * @throws ModelNotFoundException<Model>
     */
    public function getById(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $id
     * @return bool
     * @throws ModelNotFoundException<Model>
     */
    public function deleteById($id): bool
    {
        return $this->model->findOrFail($id)->delete();
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     * @throws ModelNotFoundException<Model>
     */
    public function update(int $id, array $data): bool
    {
        return $this->model->findOrFail($id)->update($data);
    }
}
