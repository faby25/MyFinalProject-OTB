<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \DB::table('users')->insert([
         User::create([
        'ci'=>'1000000',
        'username'=>'SuperAdmin',
        'name' => 'SuperAdmin',
        'lastnameM' =>'OTB',
        'lastnameF' =>'SUCA',
        'telf' =>'7777777',
        'email' => 'Admin@gmail.com',
        'email_verified_at' => now(),
        'password' =>bcrypt('password'),
        'is_admin'=>'1',
        'remember_token' => '0'
        ])->assignRole('Admin');

        $user1 = User::create([
        // \DB::table('users')->insert([
        'ci'=>'1000001',
        'username'=>'Admin',
        'name' => 'Admin',
        'lastnameM' =>'OTB',
        'lastnameF' =>'SUCA',
        'telf' =>'7777777',
        'email' => 'AdminOTB@gmail.com',
        'email_verified_at' => now(),
        'password' =>bcrypt('password'),
        'is_admin'=>'1',
        'remember_token' => '1'
        ]);
        $user1->assignRole('Admin');

        $user2 = User::create([
        // \DB::table('users')->insert([
        'ci'=>'1000002',
        'username'=>'Cajero',
        'name' => 'Cajero',
        'lastnameM' =>'OTB',
        'lastnameF' =>'SUCA',
        'telf' =>'77777777',
        'email' => 'CajeroOTB@gmail.com',
        'email_verified_at' => now(),
        'password' =>bcrypt('password'),
        'is_admin'=>'1',
        'remember_token' => '2'
        ]);
        $user2->assignRole('Cajero');

        $user3 = User::create([
        // \DB::table('users')->insert([
        'ci'=>'1000003',
        'username'=>'Lecturador',
        'name' => 'Lecturador',
        'lastnameM' =>'OTB',
        'lastnameF' =>'SUCA',
        'telf' =>'77777777',
        'email' => 'LecturadorOTB@gmail.com',
        'email_verified_at' => now(),
        'password' =>bcrypt('password'),
        'is_admin'=>'1',
        'remember_token' => '3'
         ]);
         $user3->assignRole('Lecturador');
    }
}
