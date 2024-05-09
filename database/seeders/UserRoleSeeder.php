<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Adm',
            'email' => 'Adm@durden.fr',
            'password' => bcrypt('12345')
        ]);

        $user->assignRole('admin');

    }
}
