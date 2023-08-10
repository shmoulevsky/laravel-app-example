<?php

namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use App\Modules\Base\Resources\ErrorResource;
use App\Modules\Base\Resources\SuccessResource;
use App\Modules\Security\DTO\AuthDTO;
use App\Modules\Security\Requests\AuthRequest;
use App\Modules\Security\Resources\AuthResultResource;
use App\Modules\Security\Services\AuthService;
use App\Modules\User\Repositories\UserRepository;

class AuthController extends Controller
{

    public function __construct(
        public AuthService $authService,
        public UserRepository $userRepository,
    )
    {
    }

    /**
     * @OA\Post (
     *     path="/api/v1/login",
     *     summary="User auth (by email or phone)",
     *     tags={"Auth"},
     *     operationId="Login",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AuthRequest")
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/AuthResponse"),
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Bad Request",
     *     ),
     * )
     *
     */
    public function login(AuthRequest $request)
    {
        $authDTO = new AuthDTO(
            $request->login,
            $request->password,
        );

        try{
            $userDTO = $this->authService->login($authDTO);
        }catch (\Exception $exception){

            return new ErrorResource($exception);
        }

        return new AuthResultResource(
            $userDTO,
            null
        );

    }

    /**
     * @OA\Post (
     *     path="/api/v1/auth/logout",
     *     summary="Logout",
     *     tags={"Auth"},
     *     operationId="Logout",
     *     @OA\Response(
     *         response="200",
     *         description="Success",
     *     ),
     * )
     *
     */
    public function logout()
    {
        auth()->logout();
        return new SuccessResource(null);
    }

    /**
     * @OA\Post (
     *     path="/api/v1/auth/refresh",
     *     summary="Token refresh",
     *     tags={"Auth"},
     *     operationId="Refresh",
     *     @OA\Response(
     *         response="200",
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/RefreshResponse"),
     *     ),
     * )
     *
     */
    public function refresh()
    {
        return response()->json(['token' => auth()->refresh()]);
    }

}
