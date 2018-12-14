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
            ['5k by 2019', 'Beginning runners. Complete a 5k by 1/1/2019.', '2018-12-01', '2018-12-31'],
            ['10k by Feb', 'Complete a 10K Run by Feb. 1 2019', '2019-1-1', '2019-01-31'],
            ['Improve Current Pace', 'Improve your current pace by 30 seconds on a 5K', '2019-01-01', '2019-01-31'],
        ];
        $count = count($challenges);

        foreach ($challenges as $key => $cData) {
            $challenge = new Challenge();

            $challenge->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $challenge->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $challenge->name = $cData[0];
            $challenge->description = $cData[1];
            $challenge->start_date = $cData[2];
            $challenge->end_date = $cData[3];

            $challenge->save();
            $count--;
        }
    }
}
