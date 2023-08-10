<?php

namespace App\Modules\Security\Services;

use App\Modules\Security\DTO\CheckCodeRestorePasswordDTO;
use App\Modules\Security\DTO\SendCodeRestorePasswordDTO;
use App\Modules\Security\Interfaces\SendCodeServiceInterface;
use App\Modules\User\Repositories\UserRepository;
use App\Modules\User\Services\UserService;

class RestorePasswordService
{
    public function __construct(
        public SendCodeServiceInterface $sendCodeService,
        public CheckCodeService $checkCodeService,
        public UserService $userService,
        public UserRepository $userRepository,
        public HashService $hashService,
    )
    {
    }

    public function sendCode(SendCodeRestorePasswordDTO $dto)
    {
        $code = $this->sendCodeService->send(
            $dto->card,
            $dto->ip,
            $dto->phone,
            $dto->email
        );

        $this->checkCodeService->store(
            $dto->card,
            $code,
            $dto->phone,
            $dto->email,
        );
    }

    public function changePassword(CheckCodeRestorePasswordDTO $dto)
    {
        $this->checkCodeService->check($dto->phone, $dto->email, $dto->card, $dto->code);
        $user = $this->userRepository->getById($dto->userId);
        $user->PASSWORD = $this->hashService->generateHash($dto->password);
        $user->save();
        $this->checkCodeService->clear($dto->phone, $dto->email, $dto->card);
    }

}
