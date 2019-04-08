<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1;');
        DB::table('users')->insert([
            'name'         => 'admin',
            'username'     => 'admin',
            'birth_day'    => \Carbon\Carbon::now(),
            'phone_number' => '0963988388',
            'address'      => 'Mo lao tay ho',
            'email'        => 'admin@gmail.com',
            'password'     => bcrypt('secret'),
            'created_at'   => \Carbon\Carbon::now(),
            'updated_at'   => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'         => 'test',
            'username'     => 'test',
            'birth_day'    => \Carbon\Carbon::now(),
            'phone_number' => '0963988399',
            'address'      => 'Mo lao tay ho',
            'email'        => 'test@gmail.com',
            'password'     => bcrypt('secret'),
            'created_at'   => \Carbon\Carbon::now(),
            'updated_at'   => \Carbon\Carbon::now(),
        ]);
    }
}
