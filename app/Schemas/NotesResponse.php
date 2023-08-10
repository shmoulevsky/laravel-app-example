<?php

namespace App\Schemas;


/**
 * @OA\Schema(
 *     description="Desc",
 *     type="object",
 *     title="NoteResponse",
 * )
 */
class NotesResponse
{
    /**
     * @OA\Property(
     *          property="data",
     *          type="array",
     *          @OA\Items(ref="#/components/schemas/NoteShortItem"))
     *
     *
     * @var array $data
     */
    public array $data;


}
