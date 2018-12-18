@extends('layouts.master')

@section('content')
    <section>
        @include('layouts.challengeheader')
    </section>
    <div class='defForm'>
        <form method='post' action='/joinchallenge'>
            {{ method_field('put') }}
            {{ csrf_field() }}
            <h2>All Challenges</h2>

            <table>
                <thead>
                <tr>
                    <td></td>
                    <td>Challenge Name</td>
                    <td>Start Date</td>
                    <td>End Date</td>
                    <td>Description</td>
                </tr>
                </thead>
                @if($allchallenges)
                    @foreach($allchallenges as $challenge)
                        <tr>
                            <td><input type='checkbox' name='challenges[]'
                                       value='{{$challenge->id}}'
                                       {{(in_array($challenge->id, $userchallenges))?'checked' : ''}}
                                ></td>
                            <td>{{$challenge->name}}</td>
                            <td>{{$challenge->start_date}}</td>
                            <td>{{$challenge->end_date}}</td>
                            <td>{{$challenge->description}}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
            <input type='submit' value='Join Runs'>
        </form>
    </div>

@endsection
