<?php

namespace App\Modules\User\DTO;

class UserUpdateDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $lastName,
        public string $email,
        public string $phone,
    )
    {
    }
}
