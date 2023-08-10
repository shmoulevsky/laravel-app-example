<?php

namespace App\Modules\Base\Repositories;

class BaseRepository
{
    protected $model;

    public function getById(?int $id)
    {
        return $this->model->find($id);
    }
}
