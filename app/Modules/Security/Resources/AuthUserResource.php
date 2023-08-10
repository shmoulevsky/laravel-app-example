<?php

namespace App\Modules\Security\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class AuthUserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lastname' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
