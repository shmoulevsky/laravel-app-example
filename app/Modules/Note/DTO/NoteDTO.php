<?php

namespace App\Modules\Note\DTO;

class NoteDTO
{
    public function __construct(
        public ?int $id,
        public string $title,
        public string $text,
        public int $userId,
    )
    {
    }
}
