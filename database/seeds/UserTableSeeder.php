<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'Jon Doe',
                'slug' => 'jon-doe',
                'email' => 'jondoe@test.com',
                'password' => bcrypt('secret'),
            ],
            [
                'name' => 'Ogino Chihiro',
                'slug' => 'ogino-chihiro',
                'email' => 'chihiro@test.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'Kato Ken',
                'slug' => 'kato-ken',
                'email' => 'katoken@test.com',
                'password' => bcrypt('secret')
            ],
        ]);
    }
}
