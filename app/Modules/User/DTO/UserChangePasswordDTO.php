<?php

namespace App\Modules\User\DTO;

class UserChangePasswordDTO
{
    public function __construct(
        public int $id,
        public string $password,
        public string $passwordOld
    )
    {
    }
}
