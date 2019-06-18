<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach($users as $user) {
            factory(Post::class, 10)->create([
                'user_id' => $user->id
            ]);
        }
    }
}
