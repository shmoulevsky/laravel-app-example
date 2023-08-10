<?php

namespace App\Modules\Security\Resources;




use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{

    public function __construct($resource, $error)
    {
        parent::__construct($resource);
        $this->error = $error;
    }

    public function toArray($request)
    {

        return [
            'user' => $this->resource ? $this->getUser() : null,
            'token' => $this->resource ? $this->getToken() : null,
            'errors' => $this->error
        ];
    }
}
