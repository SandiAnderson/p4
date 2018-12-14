@extends('layouts.master')

@section('content')
    <section>
        @include('layouts.trackheader')
    </section>
    <div class='defForm'>
        <h2>Edit Run</h2>
        <h4>Edit your previously logged runs.</h4>
        <p><span class='req'>*All values are required.</span></p>
        <form method='POST' action='/{{$id}}/updaterun'>
            {{ method_field('put') }}
            {{ csrf_field() }}
            <div class='elForm'>
                <label>Run Date:&nbsp;
                    <input type='text' name='rundate' value='{{$run->run_date}}'>
                </label>
            </div>
            <div class='elForm'>Run Pace:&nbsp;
                <label>Minutes <input type='number' name='runmin' min='0' max='60' size='2' value='{{$run->pace_min}}'>
                </label>
                <label>Seconds <input type='number' name='runsec' min='0' max='60' size='2' value='{{$run->pace_sec}}'>
                </label></div>
            <div class='elForm'>
                <label>Distance:  <input type='text' name='rundistance' size='4'  min='0' max='60' value='{{$run->run_distance}}'>
                </label></div>

            <div class='elForm'>
                <input type='submit' value='Edit This Run!'>
            </div>
        </form>
    </div>
    @if($errors->any())
        <div class='error'>
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection