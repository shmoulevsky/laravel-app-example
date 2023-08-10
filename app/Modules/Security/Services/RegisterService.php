<?php

namespace App\Modules\Security\Services;

use App\Modules\Security\DTO\RegisterDTO;
use App\Modules\Security\DTO\UserDTO;
use App\Modules\User\Enums\UserStatusEnum;
use App\Modules\User\Models\User;
use App\Modules\User\Services\PhoneService;

class RegisterService
{

    public function __construct(
        public PhoneService $phoneService
    )
    {
    }

    public function register(RegisterDTO $dto) :User
    {
       $user = new User();
       $user->name = $dto->name;
       $user->last_name = $dto->lastName;
       $user->password = $dto->password;
       $user->email = $dto->email;
       $user->phone = $this->phoneService->parse($dto->phone);
       $user->status = UserStatusEnum::active->value;
       $user->save();

       return $user;
    }
}
