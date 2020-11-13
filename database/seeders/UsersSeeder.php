<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'first_name' => 'Jon',
                'last_name' => 'Uik',
                'email' => 'test@gmail.com',
                'password' => bcrypt('102938'),
                'active' => 1
            ],
        ]);
    }
}
