<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('comments')->delete();

        Comment::create(array(
            'name' => 'Chris Sevilleja',
            'text' => 'Look I am a test comment.'
        ));

        Comment::create(array(
            'name' => 'Nick Cerminara',
            'text' => 'This is going to be super crazy.'
        ));

        Comment::create(array(
            'name' => 'Holly Lloyd',
            'text' => 'I am a master of Laravel and Angular.'
        ));
    }
}
