<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
// database/seeders/DatabaseSeeder.php

    public function run(): void
    {
        // Seed all roles first
        $this->call(RolesSeeder::class);

        // Then create system user
        $systemuser = User::firstOrCreate(
            ['email' => 'system@kynocloud.com'],
            [
                'name' => 'system',
                'password' => \Illuminate\Support\Facades\Hash::make('asdkkoasdk$#oadskopa%$dkaopdka@##!@#@#!##!@@#!!#@!@#@#!@#opdkoapd83901212338129312893128913289012389'),
                'email_verified_at' => now(),
            ]
        );

        $systemuser->assignRole('system');
    }
}
