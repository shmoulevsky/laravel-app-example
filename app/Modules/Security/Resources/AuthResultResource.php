<?php

namespace App\Modules\Security\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class AuthResultResource extends JsonResource
{

    public function __construct($resource, $exception)
    {
        parent::__construct($resource);
        $this->exception = $exception;
    }

    public function toArray($request)
    {
        return [
            'user' => $this->resource ? $this->getUser() : null,
            'token' => $this->resource ? $this->getToken() : null,
            'errors' => $this?->exception?->getMessage()
        ];
    }
}
