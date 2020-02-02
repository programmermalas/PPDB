<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
        $user   = User::create([
            'name'                  => 'admin',
            'number'                => '01',
            'password'              =>  bcrypt('password'),
            'password_in_string'    => 'password',
        ]);

        $role   = Role::create([
            'name'  => 'admin',
        ]);

        $user->assignRole($role->id);

        $role   = Role::create([
            'name'  => 'registrant',
        ]);
    }
}
