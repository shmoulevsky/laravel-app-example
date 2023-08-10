<?php

namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use App\Modules\Base\Resources\ErrorResource;
use App\Modules\Security\DTO\RegisterDTO;
use App\Modules\Security\DTO\UserDTO;
use App\Modules\Security\Requests\RegisterRequest;
use App\Modules\Security\Resources\RegisterResource;
use App\Modules\Security\Services\RegisterService;
use App\Modules\User\Repositories\UserRepository;

class RegisterController extends Controller
{

    public function __construct(
        public RegisterService $registerService,
        public UserRepository $userRepository,

    )
    {
    }

    /**
     * @OA\Post (
     *     path="/api/v1/register",
     *     summary="Register user",
     *     tags={"Register"},
     *     operationId="Register",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegisterRequest")
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/RegisterResponse"),
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Bad Request",
     *     ),
     * )
     *
     */
    public function register(RegisterRequest $request)
    {

        $registerDTO = new RegisterDTO(
            $request->name,
            $request->last_name,
            $request->email,
            $request->phone,
            $request->password
        );

        try{
            $user = $this->registerService->register($registerDTO);
            $token = auth()->login($user);
        }catch (\Exception $exception){
            return new ErrorResource($exception);
        }

        return new RegisterResource(new UserDTO($user, $token), null);
    }


}
