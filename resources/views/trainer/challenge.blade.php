@extends('layouts.master')

@section('content')
    <section>
        @include('layouts.challengeheader')
    </section>
    </div>

    <div class='defForm'>
        <form method='post' action='/joinchallenge'>
            {{ method_field('put') }}
            {{ csrf_field() }}
            <h4>All Challenges</h4>

            <table>
                <thead>
                <tr>
                    <td></td>
                    <td>Challenge Name</td>
                    <td>Distance</td>
                    <td>Target Pace<br>
                        Min:sec
                    </td>
                    <td>By Date</td>
                </tr>
                </thead>
                @if($allchallenges)
                    @foreach($allchallenges as $challenge)
                        <tr>
                            <td><input type='checkbox' name='challenges[]'
                                       value='{{$challenge->id}}'
                                       {{(in_array($challenge->id, $userchallenges))?'checked' : ''}}
                                ></td>
                            <td>{{$challenge->challenge_name}}</td>
                            <td>{{$challenge->distance}}</td>
                            <td>{{$challenge->pace_min}}:{{$challenge->pace_sec}}</td>
                            <td>{{$challenge->by_date}}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
            <input type='submit' value='Join Runs'>
        </form>
    </div>

@endsection
