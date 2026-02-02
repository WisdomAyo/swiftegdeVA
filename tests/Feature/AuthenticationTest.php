<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that login page is accessible.
     */
    public function test_login_page_is_accessible(): void
    {
        $response = $this->get('/account/login');

        $response->assertStatus(200);
    }

    /**
     * Test that registration page is accessible.
     */
    public function test_registration_page_is_accessible(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /**
     * Test that a user can login with valid email credentials.
     */
    public function test_user_can_login_with_valid_email(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'status' => 1,
            'is_admin' => 0,
            'role' => 'Artisan',
        ]);

        $response = $this->post('/account/login/now', [
            'options' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('user.home'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test that a user cannot login with invalid credentials.
     */
    public function test_user_cannot_login_with_invalid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'status' => 1,
            'is_admin' => 0,
        ]);

        $response = $this->post('/account/login/now', [
            'options' => 'test@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('error');
        $this->assertGuest();
    }

    /**
     * Test that admin user is redirected to admin dashboard.
     */
    public function test_admin_user_redirected_to_admin_dashboard(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'status' => 1,
            'is_admin' => 1,
            'role' => 'Admin',
        ]);

        $response = $this->post('/account/login/now', [
            'options' => 'admin@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.home'));
        $this->assertAuthenticatedAs($admin);
    }

    /**
     * Test that employer user is redirected to employer dashboard.
     */
    public function test_employer_user_redirected_to_employer_dashboard(): void
    {
        $employer = User::factory()->create([
            'email' => 'employer@example.com',
            'password' => Hash::make('password123'),
            'status' => 1,
            'is_admin' => 2,
            'role' => 'Employer',
        ]);

        $response = $this->post('/account/login/now', [
            'options' => 'employer@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('employer.home'));
        $this->assertAuthenticatedAs($employer);
    }

    /**
     * Test that unverified user cannot login.
     */
    public function test_unverified_employer_cannot_login(): void
    {
        $user = User::factory()->create([
            'email' => 'unverified@example.com',
            'password' => Hash::make('password123'),
            'status' => 0,
            'is_admin' => 2,
            'role' => 'Employer',
        ]);

        $response = $this->post('/account/login/now', [
            'options' => 'unverified@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('error');
        $this->assertGuest();
    }

    /**
     * Test a user can logout successfully.
     */
    public function test_user_can_logout(): void
    {
        $user = User::factory()->create([
            'status' => 1,
            'is_admin' => 0,
        ]);

        $this->actingAs($user);

        $response = $this->get('/account/logout');

        $response->assertRedirect(route('index.home'));
        $this->assertGuest();
    }

    /**
     * Test that user registration works with valid data.
     */
    public function test_user_can_register_with_valid_data(): void
    {
        $response = $this->post('/createUser', [
            'fullname' => 'Test User',
            'email' => 'newuser@example.com',
            'phone' => '08012345678',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('login'));

        $this->assertDatabaseHas('users', [
            'email' => 'newuser@example.com',
            'full_name' => 'Test User',
        ]);
    }

    /**
     * Test that registration fails with duplicate email.
     */
    public function test_registration_fails_with_duplicate_email(): void
    {
        User::factory()->create([
            'email' => 'existing@example.com',
        ]);

        $response = $this->post('/createUser', [
            'fullname' => 'Test User',
            'email' => 'existing@example.com',
            'phone' => '08012345679',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors('email');
    }

    /**
     * Test that registration fails with duplicate phone.
     */
    public function test_registration_fails_with_duplicate_phone(): void
    {
        User::factory()->create([
            'phone' => '08012345678',
        ]);

        $response = $this->post('/createUser', [
            'fullname' => 'Test User',
            'email' => 'unique@example.com',
            'phone' => '08012345678',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors('phone');
    }

    /**
     * Test password reset request page is accessible.
     */
    public function test_password_reset_page_is_accessible(): void
    {
        $response = $this->get('/account/password/reset');

        $response->assertStatus(200);
    }
}
