<?php

namespace Tests\Feature\Register;


use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase;
use Tests\CreatesApplication;

class RegisterTest extends TestCase
{
    use CreatesApplication, DatabaseTransactions;


    public function test_register()
    {

        $response = $this->postJson(
            route('register'),
            [
                "name" => "Test",
                "last_name" => "Testov",
                "email" => "test-it@mail.ru",
                "phone" => "+7(000)000-0000",
                "password" => "123456Pp"
            ]
        );

        $response->assertStatus(200);
        $response->assertJsonFragment(['email' => 'test-it@mail.ru']);
        $this->assertDatabaseHas('users', ['email' => 'test-it@mail.ru']);

    }

    /**
     * A basic feature test example.
     *
     * @dataProvider registerDataProvider
     *
     * @return void
     */
    public function test_register_failed(
        string $name,
        string $lastName,
        string $email,
        string $phone,
        string $password,
    )
    {
        $response = $this->postJson(
            route('register'),
            [
                "name" => $name,
                "last_name" => $lastName,
                "email" => $email,
                "phone" => $phone,
                "password" => $password,
            ]
        );

        $response->assertUnprocessable();
    }


    public static function registerDataProvider() :array
    {
        return [
            ['Test','Testov','test-itmail.ru', '8(923)000-00-00', '123456pp'],
            ['Test','Testov','', '8(923)000-00-00', '123456pp'],
            ['Test','Testov','@mail.ru', '8(923)000-00-00', '123456pp'],
            ['','Testov','test@mail.ru', '8(923)000-00-00', '123456pp'],
            ['Test','','test@mail.ru', '8(923)000-00-00', '123456pp'],
            ['Test','Testov','@mail.ru', '', ''],
            ['','','', '', ''],
        ];
    }

}
