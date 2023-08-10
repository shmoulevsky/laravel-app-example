<?php

namespace App\Schemas;

/**
 * @OA\Schema(
 *     description="Desc",
 *     type="object",
 *     title="UserProfileUpdateRequest",
 * )
 */
class UserProfileUpdateRequest
{
    /**
     * @OA\Property(property="name", type="string", example="Test", description="name")
     *
     * @var string $name
     */
    public string $name;

    /**
     * @OA\Property(property="lastname", type="string", example="Testov", description="lastname")
     *
     * @var string $lastname
     */
    public string $lastname;

    /**
     * @OA\Property(property="email", type="string", example="test@mail.ru", description="email")
     *
     * @var string $email
     */
    public string $email;

    /**
     * @OA\Property(property="phone", type="string", example="89232170000", description="phone")
     *
     * @var string $phone
     */
    public string $phone;


}
