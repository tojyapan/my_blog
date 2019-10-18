<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

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

        $faker = Factory::create();

        DB::table('users')->insert([
            [
                'name' => 'Jon Doe',
                'slug' => 'jon-doe',
                'email' => 'jondoe@test.com',
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],
            [
                'name' => 'Ogino Chihiro',
                'slug' => 'ogino-chihiro',
                'email' => 'chihiro@test.com',
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],
            [
                'name' => 'Kato Ken',
                'slug' => 'kato-ken',
                'email' => 'katoken@test.com',
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],
        ]);
    }
}
