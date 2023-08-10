<?php

namespace App\Modules\Base\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class SuccessResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'status' => true,
            'errors' => null,
        ];
    }
}
