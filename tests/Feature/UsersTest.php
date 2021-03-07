<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    /** @test  */
    public function only_logged_in_user_able_to_logout()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->post('/logout')->assertRedirect('/');
    }

    /** @test  */
    public function only_visitor_are_able_to_register()
    {
        $response = $this->get('/register')->assertOk();
    }

    /** @test  */
    public function only_visitor_are_able_to_login()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/login')->assertRedirect('/');
    }

    /** @test  */
    public function a_visitor_can_register_through_form()
    {
        $this->withoutExceptionHandling();

        $this->post('/register', [
            'firstname' => 'JohnS',
            'lastname' => 'Doe',
            'username' => 'johnny',
            'email' => 'example@dmail.com',
            'password' => 'Johnny2543',
            'password_confirmation' => 'Johnny2543',
        ]);

        $this->assertCount(1, User::all());
    }

}
