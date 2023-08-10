<?php

namespace App\Modules\Note\Services;

use App\Modules\Note\DTO\NoteDTO;
use App\Modules\Note\Models\Note;
use App\Modules\Note\Repositories\NoteRepository;

class NoteService
{
    public function __construct(
        public NoteRepository $noteRepository
    )
    {
    }

    public function createOrUpdate(NoteDTO $dto) :Note
    {
        $note = $this->noteRepository->getById($dto->id);

        if(empty($note)){
            $note = new Note();
            $note->user_id = $dto->userId;
        }

        $note->title = $dto->title;
        $note->text = $dto->text;
        $note->save();

        return $note;
    }

    public function delete(int $userId,int $id) :void
    {
        $note = $this->noteRepository->getByIdUser($userId, $id);

        if(empty($note)){
            throw new \DomainException(__('message.notes.user_not_owner'));
        }

        $note->delete();
    }

}
