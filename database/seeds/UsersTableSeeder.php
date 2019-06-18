<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()->each(function($user) {
            $profile = factory(Profile::class)->make([ 'title' => $user->name ]);
            $user->profile()->save($profile);
        });
    }
}
