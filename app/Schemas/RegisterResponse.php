<?php

namespace App\Schemas;


/**
 * @OA\Schema(
 *     description="Desc",
 *     type="object",
 *     title="RegisterFinishResponse",
 * )
 */
class RegisterResponse
{
    /**
     * @OA\Property(
     *          property="user",
     *          type="array",
     *          @OA\Items(
     *       @OA\Property(property="id", type="int", example="13934", description="id"),
     *       @OA\Property(property="name", type="string", example="Тест", description="name"),
     *       @OA\Property(property="lastname", type="string", example="Тестов", description="lastname"),
     *       @OA\Property(property="email", type="string", example="test130@mail.ru", description="email"),
     *       @OA\Property(property="phone", type="string", example="79232177300", description="phone"),
     *          ))
     *
     *
     * @var array $user
     */
    public array $user;

    /**
     * @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjEwMC4yMTAuMTAwL2FwaS9yZWdpc3Rlci9maW5pc2giLCJpYXQiOjE2ODQ3NjE1ODIsImV4cCI6MTY4NDc2NTE4MiwibmJmIjoxNjg0NzYxNTgyLCJqdGkiOiJSQ0R5TlhXaW10UjNOa2NxIiwic3ViIjoiMTM5MzQiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.xyYTVoQPJYG7Zm4RBJ2wDpaAztX4M46-DiLPrh4Jw0A", description="token")
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
