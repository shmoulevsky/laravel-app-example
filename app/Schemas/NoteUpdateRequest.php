<?php

namespace App\Schemas;


/**
 * @OA\Schema(
 *     description="Desc",
 *     type="object",
 *     title="NoteUpdateRequest",
 * )
 */
class NoteUpdateRequest
{
    /**
     * @OA\Property(property="title", type="string", example="Note title", description="title")
     *
     * @var string $title
     */
    public string $title;

    /**
     * @OA\Property(property="text", type="string", example="Note text", description="text")
     *
     * @var string $text
     */
    public string $text;


}
