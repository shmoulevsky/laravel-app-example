<?php

namespace App\Schemas;


/**
 * @OA\Schema(
 *     description="Desc",
 *     type="object",
 *     title="RefreshResponse",
 * )
 */
class RefreshResponse
{
    /**
     * @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjEwMC4yMTAuMTAwL2FwaS92MS9hdXRoL3JlZnJlc2giLCJpYXQiOjE2ODQ4NTM0NTIsImV4cCI6MTY4NDg1NzA1MywibmJmIjoxNjg0ODUzNDUzLCJqdGkiOiIwb0xOMUo5UURLZThEaFFiIiwic3ViIjoiMTM5MzQiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.Qg5idCiXw6VdXHAQzDdskP-gSnHgFpQYB56LBLZWoPY", description="token")
     *
     * @var string $token
     */
    public string $token;


}
