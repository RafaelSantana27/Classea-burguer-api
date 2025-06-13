<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add user Adminstrador
        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin@classea.com.br';
        $user->password = bcrypt('admin123');
        $user->is_admin = true;
        $user->save();
    }
}
