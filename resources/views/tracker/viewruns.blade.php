@extends('layouts.master')


@section('content')
    @include('layouts.trackheader')

    <div class='defForm'>
        <h2>My Runs</h2>

        <table>
            <thead>
            <tr>
                <td>Run Date</td>
                <td>Run Distance</td>
                <td>Run Pace<br>
                    Min:Sec
                </td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            @if($searchResults)
                @foreach($searchResults as $results)
                    <tr>
                        <td>{{$results->run_date}}</td>
                        <td>{{$results->run_distance}}</td>
                        <td>{{$results->pace_min}}:{{$results->pace_sec}}</td>
                        <td><a href='/{{$results->id}}/editrun'>Edit</a></td>
                        <td><a href='/{{$results->id}}/deleterun'>Delete</a></td>
                    </tr>
                @endforeach
            @endif

        </table>
    </div>
    @if(session('alert'))
        <div class='time'>{{session('alert')}}</div>
    @endif
@endsection