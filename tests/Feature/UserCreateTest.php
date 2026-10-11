<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserCreateTest extends TestCase
{
    use RefreshDatabase;

    public function test_command_creates_administrator_with_hashed_password(): void
    {
        $this->artisan('app:user-create', $this->arguments())
            ->expectsOutput('Пользователь добавлен!')->assertExitCode(0);

        $user = User::sole();
        $this->assertSame('Администратор', $user->name);
        $this->assertSame('admin@example.test', $user->email);
        $this->assertTrue($user->is_admin);
        $this->assertTrue(Hash::check('test-password', $user->password));
        $this->assertNotSame('test-password', $user->password);
    }

    public function test_command_can_create_regular_user(): void
    {
        $this->artisan('app:user-create', array_replace($this->arguments(), ['is_admin' => 0]))
            ->assertExitCode(0);

        $this->assertFalse(User::sole()->is_admin);
    }

    public function test_duplicate_email_does_not_change_existing_user(): void
    {
        $this->artisan('app:user-create', $this->arguments())->assertExitCode(0);
        $attributes = User::sole()->getAttributes();

        $this->artisan('app:user-create', array_replace($this->arguments(), ['name' => 'Другой', 'password' => 'changed']))
            ->expectsOutput('Пользователь с email admin@example.test уже существует')->assertExitCode(1);

        $this->assertSame($attributes, User::sole()->getAttributes());
    }

    private function arguments(): array
    {
        return ['name' => 'Администратор', 'email' => 'admin@example.test', 'is_admin' => 1, 'password' => 'test-password'];
    }
}
