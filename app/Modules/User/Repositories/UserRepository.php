<?php

namespace App\Modules\User\Repositories;

use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\User\Models\User;
use App\Modules\User\Services\PhoneService;

class UserRepository extends BaseRepository
{

    public function __construct()
    {
        $this->model = new User();
        $this->phoneService = new PhoneService();
    }

    public function getByEmailPhone(string $login)
    {
        $phone = $this->phoneService->parse($login);

        return User::where(function ($query) use ($login, $phone){
            $query->where('email', $login);
            $query->orWhere('phone', $phone);
        })->first();
    }
}
