<?php

namespace App\Modules\Security\DTO;

class AuthDTO
{
    public string $login;
    public string $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }
}
