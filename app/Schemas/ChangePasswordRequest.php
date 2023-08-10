<?php

namespace App\Schemas;


/**
 * @OA\Schema(
 *     description="Desc",
 *     type="object",
 *     title="ChangePasswordRequest",
 * )
 */
class ChangePasswordRequest
{
    /**
     * @OA\Property(property="password", type="string", example="12345678pp", description="password")
     *
     * @var string $password
     */
    public string $password;

    /**
     * @OA\Property(property="password_confirmation", type="string", example="12345678pp", description="password_confirmation")
     *
     * @var string $password_confirmation
     */
    public string $password_confirmation;

    /**
     * @OA\Property(property="password_old", type="string", example="12345678pp", description="password_confirmation")
     *
     * @var string $password_old
     */
    public string $password_old;


}
