<?php

use Illuminate\Database\Seeder;
use App\Profile;


class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = Profile::updateOrCreate(
            ['user_id' => 1],
            ['gender' => 'F']);
    }
}

