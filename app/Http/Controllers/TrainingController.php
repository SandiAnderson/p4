<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Runs;
Use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Nullable;
use Illuminate\Support\Facades\Auth;


class TrainingController extends Controller
{
    //
    public function welcome()
    {
        return view('welcome');
    }

    public function estimate()
    {
        return view('trainer.estimate');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'minutes' => 'required|numeric|min:1|max:60',
            'seconds' => 'required|numeric|min:0|max:60',
            'distance' => 'required',
            'endurance' => 'required',
            'training' => 'required'
        ]);

        $minutes = (int)$request->minutes;
        $seconds = (int)$request->seconds;
        $distance = $request->distance;
        $endurance = $request->endurance;
        $elevation = $request->elevation;
        $training = $request->training;
        //if validation passes, start logic to calc the estimated race time

        #convert total time to seconds
        $t = ($minutes * 60) + (int)$seconds;

        #get the total time based on current pace
        if ($distance == 'fivek') {
            $d = config('app.calcvalues.fivek');
        } elseif ($distance == 'tenk') {
            $d = config('app.calcvalues.tenk');
        } elseif ($distance == 'half') {
            $d = config('app.calcvalues.half');
        } elseif ($distance == 'full') {
            $d = config('app.calcvalues.full');
        }
        #total time in seconds/60 for total minutes
        $time = ($t * (float)$d);

        # now add a factor if there is elevation
        if ($elevation == 'hill') {
            $e = config('app.calcvalues.hill');
        } elseif ($elevation == 'elevate') {
            $e = config('app.calcvalues.elevate');
        } elseif ($elevation == 'obstacle') {
            $e = config('app.calcvalues.obstacle');
        } else {
            $e = '0';
        }
        #add multiplyer for the elevation

        $time = $time + ($time * $e);

        #now for the training
        if ($training == 'yes') {
            $time = $time - ($time * (config('app.calcvalues.training')));
        }

        //convert seconds to hour:min:sec
        $ftime = sprintf('%02d:%02d:%02d', floor($time / 3600), floor($time / 60) % 60, ($time % 60));

        //Store current pace in session for use in planner
        session(['minutes' => $minutes]);
        session(['seconds' => $seconds]);

        #update estimator with the estimated time using flash data
        return redirect('/estimate')->withInput()->with([
            'ftime' => ($ftime),
        ]);
    }


    public function planner()
    {
        return view('trainer.plan');
    }

    public function plan(Request $request)
    {
        $request->validate([
            'minutes' => 'required|numeric|min:1|max:60',
            'seconds' => 'required|numeric|min:0|max:60',
            'targetmin' => 'required|numeric|min:1|max:60',
            'targetsec' => 'required|numeric|min:0|max:60',
            'racedate' => 'bail|required|date|after:next week',
        ]);

        $currentmin = (int)$request->minutes;
        $currentsec = (int)$request->seconds;
        $targetmin = (int)$request->targetmin;
        $targetsec = (int)$request->targetsec;
        $racedate = $request->racedate;


        //get the difference between current and target pace
        $currentpace = ($currentmin * 60) + $currentsec;
        $targetpace = ($targetmin * 60) + $targetsec;

        $improve = $currentpace - $targetpace;
        $fimprove = sprintf('%02d:%02d', floor($improve / 60) % 60, ($improve % 60));


        //get the number of weeks
        $today = today();
        $goal = $today->diffInWeeks($racedate);

        //divide improvement pace by number of weeks
        $incimprove = $improve / $goal;
        $fincimprove = sprintf('%02d:%02d', floor($incimprove / 60) % 60, ($incimprove % 60));

        #update planner with the improvement calculation
        return redirect('/planner')->withInput()->with([
            'improve' => $fimprove,
            'goal' => $goal,
            'racedate' => $racedate,
            'fincimprove' => $fincimprove
        ]);

    }




}
