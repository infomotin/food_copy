<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new \App\Models\Client();
        $client->name = 'Client';
        $client->username = 'client';
        $client->email = 'client@example.com';
        $client->password = bcrypt('123');
        $client->save();
    }
}
