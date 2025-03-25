<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\UserRole;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (UserRole::all() as $role) {
            $role = Role::query()->createOrFirst([
                'name' => ucfirst($role),
            ]);
        }

        if ( ! User::query()->whereRelation('roles', 'name', '=', UserRole::LIBRARIAN)->exists()) {
            /** @var User $user */
            $user = \App\Models\User::query()->create([
                'name' => 'Librarian',
                'email' => 'librarian@library.com',
                'password' => bcrypt('password'),
            ]);

            $user->assignRole(UserRole::LIBRARIAN);
        }
    }
}
