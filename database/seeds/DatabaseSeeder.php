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
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RunsTableSeeder::class);
        $this->call(ChallengesTableSeeder::class);
        $this->call(ChallengeUserTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
    }
}
