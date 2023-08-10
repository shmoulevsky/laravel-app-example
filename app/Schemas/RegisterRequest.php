<?php

namespace App\Schemas;


/**
 * @OA\Schema(
 *     description="Desc",
 *     type="object",
 *     title="RegisterRequest",
 * )
 */
class RegisterRequest
{
    /**
     * @OA\Property(property="name", type="string", example="Test", description="name")
     *
     * @var string $name
     */
    public string $name;

    /**
     * @OA\Property(property="last_name", type="string", example="Testov", description="last name")
     *
     * @var string $last_name
     */
    public string $last_name;

    /**
     * @OA\Property(property="email", type="string", example="test130@mail.ru", description="email")
     *
     * @var string $email
     */
    public string $email;

    /**
     * @OA\Property(property="phone", type="string", example="8(923)000-7300", description="phone")
     *
     * @var string $phone
     */
    public string $phone;

    /**
     * @OA\Property(property="password", type="string", example="12345678pp", description="password")
     *
     * @var string $password
     */
    public string $password;





}
