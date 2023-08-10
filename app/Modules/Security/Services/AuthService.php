<?php

namespace App\Modules\Security\Services;

use App\Modules\Security\DTO\AuthDTO;
use App\Modules\Security\DTO\UserDTO;
use App\Modules\User\Enums\UserStatusEnum;
use App\Modules\User\Repositories\UserRepository;


class AuthService
{
    public function __construct(
        public HashService $hashService,
        public UserRepository $userRepository,
    )
    {
    }

    public function login(AuthDTO $dto) : UserDTO
    {

        $user = $this->userRepository->getByEmailPhone($dto->login);

        if (!$user) {
            throw new \DomainException(__('message.login_password.wrong'));
        }

        if($user->status === UserStatusEnum::blocked->value){
            throw new \DomainException(__('message.user.blocked'));
        }

        if($user->status === UserStatusEnum::not_confirmed->value){
            throw new \DomainException(__('message.user.not_confirmed'));
        }

        $isRightPassword = $this->hashService->isHashEquals($user->password, $dto->password);

        if(!$isRightPassword){
           throw new \DomainException(__('message.login_password.wrong'));
        }

        $token = auth()->login($user);

        return new UserDTO($user, $token);
    }

    public function refresh() : UserDTO
    {
        $token = auth()->refresh();
        $user = auth()->user();
        return new UserDTO($user, $token);
    }

}
