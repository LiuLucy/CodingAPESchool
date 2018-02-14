<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');
    }
}


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        \App\User::create([
            'name' => 'Bo_Hong_Liou',
            'nick_name' => 'Lucy',
            'gender' => '1',
            'email' => 'lucy933626@gmail.com',
            'password' =>  Hash::make('lucy0970'),
            'birthday' => '1995/09/16',
            'card_id' => 'N125954298',
        ]);
    }
}
