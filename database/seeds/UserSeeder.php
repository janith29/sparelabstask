<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Janith Sandaruwan',
            'email'    => 'janithsandaruwan29@gmail.com',
            'userrole' => 'admin',
            'image' => '1usertpic.jpeg',
            'password' => Hash::make('Laravel'),
        ));
        User::create(array(
            'name'     => 'Sajith Lakruwan',
            'email'    => 'sajithlakruwan@gmail.com',
            'userrole' => 'admin',
            'image' => '2usertpic.jpeg',
            'password' => Hash::make('Laravel'),
        ));

    }
}
