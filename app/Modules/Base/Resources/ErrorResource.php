<?php

namespace App\Modules\Base\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceResponse;

class ErrorResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'errors' => $this->getMessage()
        ];
    }

    public function toResponse($request)
    {
        return (new ResourceResponse($this))->toResponse($request)->setStatusCode(422);
    }

}
