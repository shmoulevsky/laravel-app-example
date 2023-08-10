<?php

namespace App\Modules\User\Services;

class PhoneService
{
    public function parse(?string $phone) :?string
    {
        if(empty($phone)){
            return null;
        }

       return preg_replace('~\D~', '', $phone);

    }

}
