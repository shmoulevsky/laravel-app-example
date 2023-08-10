<?php

namespace App\Schemas;

/**
 * @OA\Schema(
 *     description="Desc",
 *     type="object",
 *     title="AuthRequest",
 * )
 */
class AuthRequest
{
    /**
     * @OA\Property(property="login", type="string", example="3876234062", description="login")
     *
     * @var string $login
     */
    public string $login;

    /**
     * @OA\Property(property="password", type="string", example="12345678pp", description="password")
     *
     * @var string $password
     */
    public string $password;


}
