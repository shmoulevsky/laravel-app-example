<?php

namespace App\Schemas;


/**
 * @OA\Schema(
 *     description="Desc",
 *     type="object",
 *     title="AuthResponse",
 * )
 */
class AuthResponse
{
    /**
     * @OA\Property(
     *          property="user",
     *          type="array",
     *          @OA\Items(
     *       @OA\Property(property="id", type="int", example="4486", description="id"),
     *       @OA\Property(property="name", type="string", example="Тест", description="name"),
     *       @OA\Property(property="lastname", type="string", example="Тестов", description="lastname"),
     *       @OA\Property(property="email", type="string", example="testov@mail.ru", description="email"),
     *       @OA\Property(property="phone", type="string", example="+79230001234", description="phone"),
     *          ))
     *
     *
     * @var array $user
     */
    public array $user;

    /**
     * @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjEwMC4yMTAuMTAwL2FwaS9hdXRoL2xvZ2luIiwiaWF0IjoxNjg0NDgzOTI5LCJleHAiOjE2ODQ0ODc1MjksIm5iZiI6MTY4NDQ4MzkyOSwianRpIjoieUJlN0xvVzhpcHRRZ0dPTyIsInN1YiI6IjQ0ODYiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.K5wsrIsneAvJh8FIIWfJXZb49bRiTjDFnLdA6xPVbAY", description="token")
     *
     * @var string $token
     */
    public string $token;

    /**
     * @OA\Property(property="error", type="string", example="", description="error")
     *
     * @var string $error
     */
    public string $error;


}
