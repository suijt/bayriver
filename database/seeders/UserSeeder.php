<?php

namespace Database\Seeders;

use App\Modules\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();

        User::create([
            'first_name' => 'super',
            'middle_name' => '',
            'last_name' => 'admin',
            'email' => 'superadmin@gmail.com',
            'phone' => '9816810976',
            'username' => 'superadmin',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'status' => 'active',
        ]);
    }
}
