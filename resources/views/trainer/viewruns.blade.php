@extends('layouts.master')


@section('content')
    <section>
        @include('layouts.trackheader')
    </section>

    <table>
        <thead>
        <tr>
            <td>Run Date</td>
            <td>Run Distance</td>
            <td>Run Pace: Min</td>
            <td>Run Pace: Sec</td>
        </tr>
        </thead>
        @if($searchResults)
            @foreach($searchResults as $results)
                <tr>
                    <td>{{$results->run_date}}</td>
                    <td>{{$results->run_distance}}</td>
                    <td>{{$results->pace_min}}</td>
                    <td>{{$results->pace_sec}}</td>
                </tr>
            @endforeach
        @endif

    </table>
@endsection