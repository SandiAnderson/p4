@extends('layouts.master')

@section('content')
    <section>
        @include('layouts.trackheader')
    </section>
    <div class='defForm'>
        <h2>Delete Run?</h2>
        <h4>Are you sure you want to delete the following run:</h4>
        <form method='POST' action='/{{$id}}/destroyrun'>
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <div class='elForm'>Run Date: {{$run->run_date}}</div>
            <div class='elForm'>Run Pace: {{$run->pace_min}} Min {{$run->pace_sec}} Sec</div>
            <div class='elForm'>Distance: {{$run->run_distance}}</div>
            <div class='elForm'>
                <input type='submit' value='Delete This Run!'>
            </div>
        </form>
    </div>
@endsection