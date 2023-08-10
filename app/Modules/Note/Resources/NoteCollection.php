<?php

namespace App\Modules\Note\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NoteCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => NoteShortResource::collection($this->collection),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
