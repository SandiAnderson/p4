@extends('layouts.master')


@section('content')
    <section>
        @include('layouts.trackheader')
    </section>

    <div class='defForm'>
        <h4>My Runs</h4>

        <table>
            <thead>
            <tr>
                <td>Run Date</td>
                <td>Run Distance</td>
                <td>Run Pace: Min</td>
                <td>Run Pace: Sec</td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            @if($searchResults)
                @foreach($searchResults as $results)
                    <tr>
                        <td>{{$results->run_date}}</td>
                        <td>{{$results->run_distance}}</td>
                        <td>{{$results->pace_min}}</td>
                        <td>{{$results->pace_sec}}</td>
                        <td><a href='/{{$results->id}}/editrun'>Edit</a></td>
                        <td><a href='/{{$results->id}}/deleterun'>Delete</a></td>
                    </tr>
                @endforeach
            @endif

        </table>
    </div>
@endsection