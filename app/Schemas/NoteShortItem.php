<?php
namespace App\Schemas;


/**
* @OA\Schema(
*     description="Desc",
*     type="object",
*     title="NoteShortItem",
* )
*/
class NoteShortItem
{
/**
* @OA\Property(property="id", type="int", example="2", description="id")
*
* @var int $id
*/
public int $id;

/**
* @OA\Property(property="title", type="string", example="Note title", description="title")
*
* @var string $title
*/
public string $title;


}
