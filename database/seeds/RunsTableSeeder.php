<?php

use Illuminate\Database\Seeder;
use App\Runs;

class RunsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //populate the runs table with test data
        //userid, rundate, run_distance, pace_min, pace_sec
        $runs = [
            ['1', '2018-11-03', '3.0', '8', '22'],
            ['1', '2018-11-07', '3.2', '8', '15'],
            ['1', '2018-11-07', '3.5', '8', '21'],
            ['2', '2018-11-04', '2.1', '7', '47'],
        ];
        $count = count($runs);

        foreach ($runs as $key => $runData) {
            $run = new Runs();

            $run->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $run->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $run->user_id = $runData[0];
            $run->run_date = $runData[1];
            $run->run_distance = $runData[2];
            $run->pace_min = $runData[3];
            $run->pace_sec = $runData[4];

            $run->save();
            $count--;
        }

    }
}