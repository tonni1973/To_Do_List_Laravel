<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->get('/login')->assertSeeText('Login');
    }

    public function testLoginSuccess()
    {
        $this->post('/login', [
            "user" => "Tonni",
            "password" => "rahasia"
        ])->assertRedirect('/')
          ->assertSessionHas("user", "Tonni");
    }

    public function testLoginValidationError()
    {
        $this->post('/login', [])
             ->assertSeeText("User or password is required");
    }

    public function testLoginFailed()
    {
        $this->post('/login', [
            "user" => "Nad",
            "password" => "rah4sia"
        ])->assertSeeText("User or password is wrong");
    }
}
