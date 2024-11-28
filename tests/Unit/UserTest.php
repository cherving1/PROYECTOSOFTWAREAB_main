<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableAttributes()
    {
        $user = new User();

        $fillable = ['name', 'email', 'password'];

        $this->assertEquals($fillable, $user->getFillable());
    }
}
