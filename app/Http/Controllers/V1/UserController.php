<?php

namespace App\Http\Controllers\V1;


use App\Modules\Base\Resources\ErrorResource;
use App\Modules\Base\Resources\SuccessResource;
use App\Modules\User\DTO\UserChangePasswordDTO;
use App\Modules\User\DTO\UserUpdateDTO;
use App\Modules\User\Repositories\UserRepository;
use App\Modules\User\Requests\ChangePasswordRequest;
use App\Modules\User\Requests\UserUpdateRequest;
use App\Modules\User\Resources\UserProfileResource;
use App\Modules\User\Services\UserService;

class UserController
{
    public function __construct(
        public UserRepository $userRepository,
        public UserService $userService,
    )
    {
    }

    /**
     * @OA\Get(
     *     path="/api/v1/auth/profile",
     *     summary="Get user profile",
     *     tags={"User"},
     *     operationId="Profile",
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
     */
    public function profile()
    {
        $userId = auth()->id();
        $user = $this->userRepository->getById($userId);
        return new UserProfileResource($user);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/auth/profile",
     *     summary="Update user profile",
     *     tags={"User"},
     *     description="",
     *     operationId="UserUpdate",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UserProfileUpdateRequest")
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Updated",
     *         @OA\JsonContent(ref="#/components/schemas/SuccessResponse"),
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Error",
     *     ),
     * )
     */
    public function update(UserUpdateRequest $request)
    {
        $userId = auth()->id();

        $dto = new UserUpdateDTO(
            $userId,
            $request->name,
            $request->last_name,
            $request->email,
            $request->phone,
        );

        try{
            $user = $this->userService->update($dto);
        }catch (\Exception $exception){
            return new ErrorResource($exception);
        }

        return new SuccessResource($user);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/auth/profile/password",
     *     summary="Update user password",
     *     tags={"User"},
     *     description="",
     *     operationId="UserPasswordUpdate",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ChangePasswordRequest")
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Updated",
     *         @OA\JsonContent(ref="#/components/schemas/SuccessResponse"),
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Error",
     *     ),
     * )
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $userId = auth()->id();
        $dto = new UserChangePasswordDTO(
            $userId,
            $request->password,
            $request->password_old
        );

        try{
            $user = $this->userService->changePassword($dto);
        }catch (\Exception $exception){
            return new ErrorResource($exception);
        }

        return new SuccessResource($user);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/auth/profile",
     *     summary="Delete user",
     *     tags={"User"},
     *     description="",
     *     operationId="UserDelete",
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
    public function delete()
    {
        $userId = auth()->id();

        try{
            $this->userService->delete($userId);
        }catch (\Exception $exception){
            return new ErrorResource($exception);
        }

        return new SuccessResource(null);
    }

}
