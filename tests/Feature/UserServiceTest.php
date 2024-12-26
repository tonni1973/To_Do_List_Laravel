<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\UserService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserServiceTest extends TestCase
{
   private UserService $userService;

   public function setUp():void
   {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
   }

   public function testSample()
   {
        self::assertTrue(true);
   }

   public function testLogin()
   {
        self::assertTrue($this->userService->login("Tonni", "rahasia"));
   }

   public function testLoginUserNotFound()
   {
        self::assertFalse($this->userService->login("Nad", "NaD"));
   }

   public function testLoginWrongPassword()
   {
        self::assertFalse($this->userService->login("Tonni", "Gamabunta"));
   }
}
