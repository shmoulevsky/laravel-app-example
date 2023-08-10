<?php

namespace App\Modules\Base\DTO;

use Illuminate\Http\Request;

class ParamListDTO
{
    private $sort;
    private $dir;
    private $filter;
    private $count;

    public function __construct(
        ?string $sort,
        ?string $dir,
        ?array $filter,
        ?int $count
    )
    {
        $this->sort = $sort;
        $this->dir = $dir;
        $this->filter = $filter;
        $this->count = $count;
    }

    public static function fromRequest(Request $request, $defaultSort = 'id', $defaultDir = 'desc') : self
    {
        $sort = $request->sort ?? $defaultSort;
        $dir = $request->dir ?? $defaultDir;
        $filter = $request->filter ?? [];
        $count = $request->count ?? 10;

        if($dir === 'null'){
            $dir = $defaultDir;
        }

        if($sort === 'null'){
            $sort = $defaultSort;
        }

        return new self($sort, $dir, $filter, $count);
    }

    public function getSort(): ?string
    {
        return $this->sort;
    }

    public function getDir(): ?string
    {
        return $this->dir;
    }

    public function getFilter(): ?array
    {
        return $this->filter;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }
}
