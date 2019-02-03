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
        App\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => \Illuminate\Support\Facades\Hash::make('secret'),
            'role_id' => \App\Role::admin()->first()->id
        ]);

        App\User::create([
            'name' => 'client1',
            'email' => 'client1@client.com',
            'password' => \Illuminate\Support\Facades\Hash::make('secret'),
            'role_id' => \App\Role::client()->first()->id
        ]);

        App\User::create([
            'name' => 'client2',
            'email' => 'client2@client.com',
            'password' => \Illuminate\Support\Facades\Hash::make('secret'),
            'role_id' => \App\Role::client()->first()->id
        ]);
    }
}
