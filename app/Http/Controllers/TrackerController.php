<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\Challenge;
use App\Runs;
Use App\User;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Nullable;
use Illuminate\Support\Facades\Auth;

class TrackerController extends Controller
{
    public function tracker()
    {
        $user = Auth::user();
        return view('tracker.track')->with(['user' => $user]);
    }

    public function trackrun(Request $request)
    {
        $request->validate([
            'rundate' => 'bail|required|date|before:tomorrow',
            'runmin' => 'required|numeric|min:1|max:60',
            'runsec' => 'required|numeric|min:0|max:60',
            'rundistance' => 'required'
        ]);

        $run = new Runs();
        //get users Id
        $id = Auth::id();

        //format the date
        $requestdate = date_create($request->input('rundate'));
        $rundate = date_format($requestdate,'Y-m-d');

        $run->run_date = $rundate;
        $run->pace_min = $request->input('runmin');
        $run->pace_sec = $request->input('runsec');
        $run->run_distance = $request->input('rundistance');
        $run->user_id = $id;
        $run->save();

        return redirect('/viewruns')->with([
            'alert'=>'Your Run has been added'
        ]);
    }


    public function viewruns()
    {
        $id = Auth::id();

        $searchResults = Runs::where('user_id', '=', $id)->get();
        return view('tracker.viewruns')->with([
            'id' => $id,
            'searchResults' => $searchResults
        ]);
    }


    public function editrun($id = null)
    {
        $run = Runs::find($id);

        if (!$run) {
            return redirect('/tracker')->with([
                'alert' => 'Run not found.'
            ]);
        }
        return view('tracker.editrun')->with([
            'id' => $id,
            'run' => $run
        ]);
    }

    public function updaterun(Request $request, $id)
    {
        $this->validate($request, [
            'rundate' => 'bail|required|date|before:tomorrow',
            'runmin' => 'required|numeric|min:1|max:60',
            'runsec' => 'required|numeric|min:0|max:60',
            'rundistance' => 'required'
        ]);


        $run = Runs::find($id);

        $run->run_date = $request->input('rundate');
        $run->pace_min = $request->input('runmin');
        $run->pace_sec = $request->input('runsec');
        $run->run_distance = $request->input('rundistance');
        $run->save();

        return redirect('/viewruns')->with([
            'alert' => 'Your changes were saved.'
        ]);
    }

    public function deleterun($id = null)
    {
        $run = Runs::find($id);

        if (!$run) {
            return redirect('/viewruns')->with([
                'alert' => 'Run not found.'
            ]);
        }
        return view('tracker.deleterun')->with([
            'id' => $id,
            'run' => $run
        ]);
    }

    public function destroyrun($id)
    {
        $run = Runs::find($id);

        $run->delete();

        return redirect('/viewruns')->with([
            'alert' => 'Your run was deleted.'
        ]);
    }


    public function showprofile()
    {
        $user = Auth::user();
        $profile = Profile::find($user);
        return view('tracker.editprofile')->with(['profile' => $profile]);

    }

    public function editprofile()
    {
        //update to do the edit and re-route to show
        return redirect('/profile');

    }

}
