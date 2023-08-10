<?php

namespace App\Schemas;


/**
 * @OA\Schema(
 *     description="Desc",
 *     type="object",
 *     title="ProfileResponse",
 * )
 */
class ProfileResponse
{
    /**
     * @OA\Property(
     *          property="data",
     *          type="array",
     *          @OA\Items(
     *       @OA\Property(property="id", type="int", example="13934", description="id"),
     *       @OA\Property(property="name", type="string", example="Тест", description="name"),
     *       @OA\Property(property="lastname", type="string", example="Тестов", description="lastname"),
     *       @OA\Property(property="email", type="string", example="test130@mail.ru", description="email"),
     *       @OA\Property(property="phone", type="string", example="79232177338", description="phone"),
     *          ))
     *
     *
     * @var array $data
     */
    public array $data;


}
