<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Eloquent ORM method  */
        // $users = User::all();
        /** Query Builder method  */
        $user = DB::table('users')->where('email', 'oussamabouchikhi@gmail.com')->first();
        if (!$user) {
            
            User::create([
                'name' => 'Oussama',
                'email' => 'oussamabouchikhi@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin'
            ]);
        }
    }
}
 