<?php

namespace App\Modules\Security\DTO;

class RegisterDTO
{
    public function __construct(
        public string $name,
        public string $lastName,
        public string $email,
        public string $phone,
        public string $password,
    )
    {

    }
}
