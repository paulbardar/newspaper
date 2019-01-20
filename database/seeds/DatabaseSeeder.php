<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\Category::class, 4)->create();

        factory(\App\User::class, 10)->create()->each(function($u) {
            $u->profile()->save(factory(\App\Profile::class)->make());

            $u->posts()->saveMany(factory(App\Post::class, 10)->make());

            $u->posts()->each(function($post){
                $post->comments()->saveMany(factory(App\Comment::class, 10)->make());
            });
        });

    	// factory(\App\Post::class, 100)->create()->each(function($p) {
    	// 	for($i = 1;$i<rand(2,10);$i+=1){
    	// 		$p->comments()->save(factory(\App\Comment::class)->make());
    	// 	}
    	// });
        // $this->call(UsersTableSeeder::class);
    }
}
