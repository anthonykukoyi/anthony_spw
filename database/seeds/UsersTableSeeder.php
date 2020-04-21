<?php

use Illuminate\Database\Seeder;
use\Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Anthony',
            'username' => 'spw-tony',
            'email' => 'spw@example.com',
            'password' => Hash::make('7A%kWv499F')
        ]);

        $author = User::create([
            'name' => 'Bob Example',
            'username' => 'bob',
            'email' => 'bob@example.com',
            'password' => Hash::make('2!JWyP@09!')
        ]);

        $user = User::create([
            'name' => 'Mary Example',
            'username' => 'mary',
            'email' => 'mary@example.com',
            'password' => Hash::make('F!Hz08F3%M')
        ]);
    
        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
