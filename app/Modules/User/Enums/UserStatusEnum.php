<?php

namespace App\Modules\User\Enums;

enum UserStatusEnum: int
{
    case not_confirmed = 0;
    case active = 1;
    case blocked = 2;
}
