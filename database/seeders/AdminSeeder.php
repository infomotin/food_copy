<?php

namespace Database\Seeders;

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create admin model object
        $admin = new Admin();
        $admin->name = 'Admin';
        $admin->username = 'admin';
        $admin->email = 'lTcB6@example.com';
        $admin->password = Hash::make('123');
        $admin->save();
    }
}
