<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
               DB::table('Users')->insert([
            [
                'name' => '佐野新',
                'email' => 'jjuu@kkjh',
                'password' => 'password',

            ],

        ]);
    }
}
