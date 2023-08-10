<?php

namespace App\Modules\User\Services;


use App\Modules\Security\Services\HashService;
use App\Modules\User\DTO\UserChangePasswordDTO;
use App\Modules\User\DTO\UserUpdateDTO;
use App\Modules\User\Models\User;
use App\Modules\User\Repositories\UserRepository;

class UserService
{
    public function __construct(
        public HashService $hashService,
        public PhoneService $phoneService,
        public UserRepository $userRepository,
    )
    {
    }

    public function update(UserUpdateDTO $dto) :?User
    {
        $user = $this->userRepository->getById($dto->id);

        if(empty($user)){
            throw new \DomainException(__('.message.user.not_found'));
        }

        $user->name = $dto->name ?? $user->name;
        $user->last_name = $dto->lastName ?? $user->last_name;
        $user->email = $dto->email ?? $user->email;
        $user->phone = $dto->phone ?? $user->phone;

        $user->save();

        return $user;
    }

    public function changePassword(UserChangePasswordDTO $dto) :?User
    {
        $user = $this->userRepository->getById($dto->id);

        if(empty($user)){
            throw new \DomainException(__('message.user.not_found'));
        }

        if(!$this->hashService->isHashEquals($user->password, $dto->passwordOld)){
            throw new \DomainException(__('message.user.wrong_old_password'));
        }

        $user->password = $dto->password;
        $user->save();
        return $user;
    }

    public function delete(?int $userId) :void
    {
        $user = $this->userRepository->getById($userId);

        if(empty($user)){
            throw new \DomainException(__('.message.user.not_found'));
        }

        $user->delete();
    }

}
