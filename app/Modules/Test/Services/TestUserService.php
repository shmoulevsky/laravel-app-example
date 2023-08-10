<?php

namespace App\Modules\Test\Services;

use App\Modules\Security\DTO\RegisterDTO;
use App\Modules\Security\Services\RegisterService;


class TestUserService
{
    private RegisterService $registerService;

    public function __construct(

    )
    {

        $this->registerService = app()->make(RegisterService::class);
    }

    public function make(
        $email = 'test-it@mail.ru',
        $phone = '89230001890',
        $name = 'Test',
        $lastName = 'Testov',
        $password = 'test_pass123',

    )
    {
        $dto = new RegisterDTO(
            $name,
            $lastName,
            $email,
            $phone,
            $password
        );

        $user = $this->registerService->register($dto);

        return $user;
    }
}
