<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface BaseInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param integer $id
     * @return Model
     */
    public function getById(int $id): Model;

    /**
     * @param $id
     * @return bool
     */
    public function deleteById($id): bool;
    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool;
}
