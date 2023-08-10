<?php

namespace Tests\Feature\Auth;

use App\Modules\Test\Services\TestUserService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\CreatesApplication;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use CreatesApplication, DatabaseTransactions;
    protected function setUp(): void
    {
        parent::setUp();
        $testUserService = $this->app->make(TestUserService::class);
        $this->user = $testUserService->make();
    }

    /**
     * A basic feature test example.
     *
     * @dataProvider loginDataProvider
     *
     * @return void
     */
    public function test_user_can_login(string $login, string $password, int $status)
    {
        $response = $this->post(
            route('login'),
            [
                'login' => $login,
                'password' => $password,
            ]
        );

        $response->assertStatus($status);
    }

    public static function loginDataProvider()
    {
        return [
            ['test-it@mail.ru', 'test_pass123', 200], // email success
            ['89230001890', 'test_pass123', 200], // phone success
            ['test@mail.ru', 'wrong_pass', 422], // wrong pass
            ['wrong@mail.ru', 'test_pass123', 422], // wrong email
            ['', '', 302], // empty
        ];
    }
}
