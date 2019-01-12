<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Runs;
Use App\User;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Nullable;
use Illuminate\Support\Facades\Auth;


class ChallengesController extends Controller
{
    public function viewchallenge()
    {
        $id = Auth::id();
        $allchallenges = Challenge::get();
        $user = User::with('challenges')->find($id);
        $challenges = $user->challenges->pluck('id')->toArray();
        //dd($challenges);
        return view('challenge.challenge')->with([
            'allchallenges' => $allchallenges,
            'userid'=>$id,
            'userchallenges'=>$challenges,
        ]);
    }

    public function mychallenge()
    {
        $id = Auth::id();
        $user = User::with('challenges')->find($id);
        return view('challenge.mychallenge')->with([
            'user' => $user
        ]);

    }
    public function joinchallenge(Request $request)
    {
        $id = Auth::id();
        $user = User::with('challenges')->find($id);
        $user->challenges()->sync($request->challenges);

        // submit query again to reload the current challenges
        $user = User::with('challenges')->find($id);

        return redirect('/mychallenge')->with([
            'user' => $user,
            'alert' => 'Your Challenges have been updated.'
        ]);

    }
}
