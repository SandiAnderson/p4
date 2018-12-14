<?php

use Illuminate\Database\Seeder;
use App\Challenge;

class ChallengesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $challenges = [
            ['5k by 2019', '3.1', '8', '0', '2018-12-31'],
            ['10k by March', '6.2', '9', '0', '2019-03-01'],
            ['Faster 10K by March', '6.2', '8', '30', '2019-04-01'],
        ];
        $count = count($challenges);

        foreach ($challenges as $key => $cData) {
            $challenge = new Challenge();

            $challenge->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $challenge->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $challenge->challenge_name = $cData[0];
            $challenge->distance = $cData[1];
            $challenge->pace_min = $cData[2];
            $challenge->pace_sec = $cData[3];
            $challenge->by_date = $cData[4];

            $challenge->save();
            $count--;
        }
    }
}
