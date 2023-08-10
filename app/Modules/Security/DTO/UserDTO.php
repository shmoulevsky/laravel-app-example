<?php

namespace App\Modules\Security\DTO;

use App\Modules\Security\Resources\AuthUserResource;
use App\Modules\User\Models\User;

class UserDTO
{
    private ?User $user;
    private ?string $token;

    public function __construct(?User $user, ?string $token)
    {
        $this->user = $user;
        $this->token = $token;

    }

    public function getUser()
    {
        if(empty($this->user)) return [];
        return new AuthUserResource($this->user);
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

}
