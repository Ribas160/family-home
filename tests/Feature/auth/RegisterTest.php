<?php

namespace Tests\Feature\auth;



use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class RegisterTest extends TestCase
{

    use RefreshDatabase;

    public function testRegister()
    {
        Sanctum::actingAs(
            $this->post('/api/register', [
                'name' => 'John',
                'email' => 'john@mail.com',
                'password' => '12345',
                'password_confirmation' => '12345',
            ]),
            ['view-tasks']
        );
    }
}
