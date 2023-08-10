<?php

namespace App\Schemas;


/**
 * @OA\Schema(
 *     description="Success",
 *     type="object",
 *     title="SuccessResponse",
 * )
 */
class SuccessResponse
{
    /**
     * @OA\Property(
     *          property="data",
     *          type="object",
     *       @OA\Property(property="status", type="bool", example="true", description="status"),
     *       @OA\Property(property="errors", type="null", example="null", description="errors"),
     *       )
     *
     *
     * @var array $data
     */
    public array $data;


}
