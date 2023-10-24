<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use RonasIT\Support\Traits\MigrationTrait;

class AddDefaultUser extends Migration
{
    use MigrationTrait;

    public function up()
    {
        if (config('app.env') !== 'testing') {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@meetup-mocking-global-functions.com',
                'password' => Hash::make('f0b5fec2'),
                'role_id' => '1'
            ]);
        }
    }

    public function down()
    {
        if (config('app.env') !== 'testing') {
            User::where('email', 'admin@meetup-mocking-global-functions.com')->delete();
        }
    }
}
