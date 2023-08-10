<?php

namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use App\Modules\Base\DTO\ParamListDTO;
use App\Modules\Base\Resources\ErrorResource;
use App\Modules\Base\Resources\SuccessResource;
use App\Modules\Note\DTO\NoteDTO;
use App\Modules\Note\Repositories\NoteRepository;
use App\Modules\Note\Requests\NoteDeleteRequest;
use App\Modules\Note\Requests\NoteShowRequest;
use App\Modules\Note\Requests\NoteStoreRequest;
use App\Modules\Note\Requests\NoteUpdateRequest;
use App\Modules\Note\Resources\NoteCollection;
use App\Modules\Note\Resources\NoteResource;
use App\Modules\Note\Services\NoteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NoteController extends Controller
{

    public function __construct(
        public NoteService $noteService,
        public NoteRepository $noteRepository,
    )
    {
    }


    /**
     * @OA\Get(
     *     path="/api/v1/auth/notes",
     *     summary="Get notes list by current user",
     *     tags={"Note"},
     *     operationId="NotesList",
     *     @OA\Parameter(
     *          name="q",
     *          in="query",
     *          example="Note",
     *          description="query for search in title or text",
     *          required=false,
     *     ),

     *     @OA\Response(
     *         response="200",
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/NotesResponse"),
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Bad Request",
     *     ),
     * )
     *
     */
    public function index(Request $request)
    {
        $params = ParamListDTO::fromRequest($request);

        $notes = $this->noteRepository->getByUser(
            Auth::id(),
            $params->getSort(),
            $params->getDir(),
            $params->getCount(),
            $params->getFilter()
        );
        return new NoteCollection($notes);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/auth/note/{id}",
     *     summary="Get user note by id",
     *     tags={"Note"},
     *     operationId="NoteShow",
     *     @OA\Response(
     *         response="200",
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/NoteResponse"),
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Error",
     *     ),
     * )
     */
    public function show(NoteShowRequest $request)
    {
        $note = $this->noteRepository->getByIdUser($request->id, Auth::id());
        return new NoteResource($note);
    }

    /**
     * @OA\Post (
     *     path="/api/v1/notes",
     *     summary="Store user note",
     *     tags={"Note"},
     *     operationId="Store note",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/NoteStoreRequest")
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/SuccessResponse"),
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Bad Request",
     *     ),
     * )
     *
     */
    public function store(NoteStoreRequest $request)
    {
        $dto = new NoteDTO(
            null,
            $request->title,
            $request->text,
            Auth::id()
        );

        $note = $this->noteService->createOrUpdate($dto);
        return new SuccessResource($note);
    }

    /**
     * @OA\Patch (
     *     path="/api/v1/notes/{id}",
     *     summary="Update user note",
     *     tags={"Note"},
     *     operationId="Update note",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/NoteUpdateRequest")
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/SuccessResponse"),
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Bad Request",
     *     ),
     * )
     *
     */
    public function update(NoteUpdateRequest $request)
    {
        $dto = new NoteDTO(
            $request->id,
            $request->title,
            $request->text,
            Auth::id()
        );

        $note = $this->noteService->createOrUpdate($dto);
        return new SuccessResource($note);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/auth/note/{id}",
     *     summary="Delete user note by id",
     *     tags={"Note"},
     *     operationId="NoteDelete",
     *     @OA\Response(
     *         response="200",
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/SuccessResponse"),
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Error",
     *     ),
     * )
     */
    public function delete(NoteDeleteRequest $request)
    {
        try{
            $this->noteService->delete(Auth::id(), $request->id);
        }catch (\Exception $exception){
            return new ErrorResource($exception);
        }

        return new SuccessResource(null);
    }

}
