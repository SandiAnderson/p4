@extends('layouts.master')

@section('content')
    <section>
        @include('layouts.challengeheader')
    </section>
    </div>
    <div class='defForm'>

        <h2>My Challenges</h2>
        <table>
            <thead>
            <tr>
                <td>Challenge Name</td>
                <td>Start Date</td>
                <td>End Date</td>
                <td>Description</td>
            </tr>
            </thead>
            @if($user)
                @foreach($user->challenges as $challenge )
                    <tr>
                        <td>{{$challenge->name}}</td>
                        <td>{{$challenge->start_date}}</td>
                        <td>{{$challenge->end_date}}</td>
                        <td>{{$challenge->description}}</td>
                    </tr>
                @endforeach

            @endif
        </table>
    </div>

@endsection
