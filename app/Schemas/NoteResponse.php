<?php

namespace App\Schemas;


/**
 * @OA\Schema(
 *     description="Desc",
 *     type="object",
 *     title="NoteResponse",
 * )
 */
class NoteResponse
{
    /**
     * @OA\Property(
     *          property="data",
     *          type="array",
     *          @OA\Items(
     *       @OA\Property(property="id", type="int", example="1", description="id"),
     *       @OA\Property(property="title", type="string", example="Note title", description="title"),
     *       @OA\Property(property="text", type="string", example="Note text", description="text"),

     *          ))
     *
     *
     * @var array $data
     */
    public array $data;


}
