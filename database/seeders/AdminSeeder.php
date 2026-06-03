<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'admin@stockflow.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        $user->roles()->sync(Role::where('slug', 'admin')->first());
    }
}
