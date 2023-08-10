<?php

namespace App\Modules\Note\Repositories;

use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\Note\Models\Note;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class NoteRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Note();
    }

    public function getByIdUser(int $id, int $userId)
    {
        return $this->model->where([
            ['id', $id],
            ['user_id', $userId],
        ])->first();
    }

    public function getByUser(int $userId, string $sort, string $dir, string $count, array $filter) :?LengthAwarePaginator
    {
        $builder = Note::query();

        if(isset($filter['q'])){
            $builder->where(function ($query) use ($filter){
               $query->where('title', 'ilike', $filter['q']);
               $query->orWhere('text', 'ilike', $filter['q']);
            });
        }

        return $builder
            ->where('user_id', $userId)
            ->orderBy($sort, $dir)
            ->paginate($count);
    }
}
