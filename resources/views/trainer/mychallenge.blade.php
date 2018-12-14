@extends('layouts.master')

@section('content')
    <section>
        @include('layouts.challengeheader')
    </section>
    </div>
    <div class='defForm'>

    <h4>My Challenges</h4>
    <table>
        <thead>
        <tr>
            <td>Challenge Name</td>
            <td>Distance</td>
            <td colspan='2'>Target Pace: Min/sec</td>
            <td>By Date</td>
        </tr>
        </thead>
        @if($user)
            @foreach($user->challenges as $challenge )
                <tr>
                <td>{{$challenge->challenge_name}}</td>
                    <td>{{$challenge->distance}}</td>
                    <td>{{$challenge->pace_min}}</td>
                    <td>{{$challenge->pace_sec}}</td>
                    <td>{{$challenge->by_date}}</td>
                </tr>
            @endforeach

        @endif
    </table>
    </div>

@endsection
