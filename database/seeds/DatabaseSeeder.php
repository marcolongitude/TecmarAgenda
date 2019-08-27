<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->delete();

        User::create([
            'name'=>'Marco Aurélio Guimarães',
            'email'=>'marcocpdti@gmail.com',
            'password'=>bcrypt('adminmagti'),
        ]);

        Model::reguard();


    }
}
