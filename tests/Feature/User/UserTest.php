<?php

namespace Tests\Feature\User;

use App\Modules\Security\Services\HashService;
use App\Modules\Test\Services\TestUserService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\CreatesApplication;
use Tests\TestCase;

class UserTest extends TestCase
{
    use CreatesApplication, DatabaseTransactions;
    protected function setUp(): void
    {
        parent::setUp();
        $testUserService = $this->app->make(TestUserService::class);
        $this->user = $testUserService->make();
    }


    public function test_update_success()
    {
        $response = $this->actingAs($this->user)->postJson(
            route('user.profile.update'),
            [
                "name" => "Test",
                "last_name" => "Testov",
                "email" => "test-it-another@mail.ru",
                "phone" => "+7(000)000-0000",
            ]
        );

        $response->assertOk();
        $response->assertJsonFragment(['errors' => null]);
        $this->assertDatabaseHas('users', ['id' => $this->user->id, 'email' => 'test-it-another@mail.ru']);
    }

    /**
     * A basic feature test example.
     *
     * @dataProvider updateDataProvider
     *
     * @return void
     */
    public function test_update_email_failed(
        string $name,
        string $lastName,
        string $email,
        string $phone,
    )
    {
        $response = $this->actingAs($this->user)->postJson(
            route('user.profile.update'),
            [
                "name" => $name,
                "last_name" => $lastName,
                "email" => $email,
                "phone" => $phone,
            ]
        );

        $response->assertUnprocessable();
    }

    public static function updateDataProvider() :array
    {
        return [
            ['Test','Testov','test-it2mail.ru','8(000)000-0000'], // not valid
            ['Test','Testov','@mail.ru','8(000)000-0000'], // not valid
            ['','Testov','test-it2@mail.ru','8(000)000-0000'], // not valid
            ['Test','','test-it2@mail.ru','8(000)000-0000'], // not valid
            ['Test','Testov','','8(000)000-0000'], // not valid
            ['Test','Testov','test-it2@mail.ru',''], // not valid
            ['','','',''], // all empty
        ];
    }


    public function test_change_password_success()
    {
        $hashService = $this->app->make(HashService::class);
        $response = $this->actingAs($this->user)->postJson(
            route('user.profile.change.password'),
            [
                "password" => "12345678",
                "password_confirmation" => "12345678",
                "password_old" => "test_pass123"
            ]
        );

        $this->user->refresh();
        $response->assertOk();
        $response->assertJsonFragment(['errors' => null]);
        $this->assertTrue($hashService->isHashEquals($this->user->password, "12345678"));
    }

    /**
     * A basic feature test example.
     *
     * @dataProvider passwordChangeDataProvider
     *
     * @return void
     */
    public function test_change_password_failed(?string $password,?string $passwordConfirmation)
    {
        $hashService = $this->app->make(HashService::class);
        $response = $this->actingAs($this->user)->postJson(
            route('user.profile.change.password'),
            [
                "password" => $password,
                "password_confirmation" => $passwordConfirmation,
                "password_old" => "test_pass123"
            ]
        );

        $this->user->refresh();
        $response->assertUnprocessable();
        $this->assertFalse($hashService->isHashEquals($this->user->password, "123456"));
    }

    public static function passwordChangeDataProvider() :array
    {
        return [
            [null,null], // not valid
            ["123456",null], // not valid
            ["123456","123"], // not valid
            ["123","123"], // not valid
            ["123","123456"], // not valid
        ];
    }

}
