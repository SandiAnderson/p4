@extends('layouts.master')

@section('content')
    <div class='defForm'>
        <h2>Training Planner</h2>
        <h4>Use this planner to estimate your target incremental improvement each
            week in order to meet your race pace time goal.</h4>
        <p><span class='req'>*All values are required.</span></p>
        <form method='get' action='/plan'>
            <div class='elForm'>Current Mile Pace:&nbsp;
                <label>Minutes <input type='number' name='minutes' min='0' max='60' size='2'
                            @include('modules.displayvalue', ['type'=>'number', 'source'=>'minutes'])>
                </label>
                <label>Seconds <input type='number' name='seconds' min='0' max='60' size='2'
                            @include('modules.displayvalue', ['type'=>'number', 'source'=>'seconds'])>
                </label></div>

            <div class='elForm'>Target Mile Pace:&nbsp;
                <label>Minutes <input type='number' name='targetmin' min='0' max='60' size='2'
                            @include('modules.displayvalue', ['type'=>'number', 'source'=>'targetmin'])>
                </label>
                <label>Seconds <input type='number' name='targetsec' min='0' max='60' size='2'
                            @include('modules.displayvalue', ['type'=>'number', 'source'=>'targetsec'])>
                </label></div>

            <div class='elForm'>
                <label>When is your race?&nbsp;
                    <input type='text' name='racedate'
                            @include('modules.displayvalue', ['type'=>'date', 'source'=>'racedate'])>
                </label>
            </div>

            <div class='elForm'>
                <input type='submit' value='Estimate Training Goal'>
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
    @else
        @if(session('improve'))
            <div class='time'>To reach your target pace, you need to improve
                your time by {{session('improve')}} per mile.<br>
                To make this pace by {{session('racedate')}},
                you will need to improve by {{session('fincimprove')}} per
                week.
{{--
                @if (Auth::check())
                    <br>
                    <a href='#' onClick='document.getElementById("setgoal").submit();'>Set as Profile Goal</a>
                    <form method='POST' id='setgoal' action='/editprofile'>
                        {{ csrf_field() }}
                    </form>

                @endif
--}}
            </div>
        @endif

    @endif
@endsection