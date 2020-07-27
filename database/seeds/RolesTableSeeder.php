<?php

use App\User;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Add Roles
         *
         */
        if (Role::where('slug', '=', 'admin')->first() === null) {
            $adminRole = Role::create([
                'name'        => 'Admin',
                'slug'        => 'admin',
                'description' => 'Admin Role',
                'level'       => 5,
            ]);
        }

        if (Role::where('slug', '=', 'doctor')->first() === null) {
            $userRole = Role::create([
                'name'        => 'doctor',
                'slug'        => 'doctor',
                'description' => 'doctor Role',
                'level'       => 2,
            ]);
        }

        if (Role::where('slug', '=', 'patient')->first() === null) {
            $userRole = Role::create([
                'name'        => 'patient',
                'slug'        => 'patient',
                'description' => 'patient Role',
                'level'       => 2,
            ]);
        }

        if (Role::where('slug', '=', 'unverified')->first() === null) {
            $userRole = Role::create([
                'name'        => 'unverified',
                'slug'        => 'unverified',
                'description' => 'unverified Role',
                'level'       => 1,
            ]);
        }
    }
}
