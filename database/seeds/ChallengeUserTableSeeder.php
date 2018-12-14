<?php

use Illuminate\Database\Seeder;
use App\Challenge;
use App\User;

class ChallengeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $challenges = [
            '5k by 2019' => ['Jill Harvard'],
            '10k by March' => ['Jamal Harvard', 'Jill Harvard'],
            'Faster 10K by March' => ['Jamal Harvard']
        ];

        # Now loop through the above array, creating a new pivot for each challenge to user
        foreach ($challenges as $name => $users) {

            # First get the challenge
            $challenge = Challenge::where('challenge_name', 'like', $name)->first();

            # Now loop through each user for this challenge, adding the pivot
            foreach ($users as $username) {
                $username = User::where('name', '=', $username)->first();

                # Connect this tag to this book
                $challenge->users()->save($username);
            }
        }
    }
}