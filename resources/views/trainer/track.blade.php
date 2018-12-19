@extends('layouts.master')

@section('content')
    @include('layouts.trackheader')
    <div class='defForm'>
        <h2>Track Your Runs</h2>
        <h4>{{ $user->name }}, Use the tracker to log your runs and track your incremental improvement each
            week in order to meet your race pace goal.</h4>

        <p><span class='req'>*All values are required.</span></p>
        <form method='get' action='/trackrun'>

            <div class='elForm'>
                <label>Run Date:&nbsp;
                    <input type='text' name='rundate'
                            @include('modules.displayvalue', ['type'=>'date', 'source'=>'rundate'])>
                </label>
            </div>
            <div class='elForm'>Run Pace:&nbsp;
                <label>Minutes <input type='number' name='runmin' min='0' max='60' size='2'
                            @include('modules.displayvalue', ['type'=>'number', 'source'=>'runmin'])>
                </label>
                <label>Seconds <input type='number' name='runsec' min='0' max='60' size='2'
                            @include('modules.displayvalue', ['type'=>'number', 'source'=>'runsec'])>
                </label></div>
            <div class='elForm'><label>Distance:
                    <input type='text' name='rundistance' size='5'
                            @include('modules.displayvalue', ['type'=>'text', 'source'=>'rundistance'])>
                </label>
            </div>

            <div class='elForm'>
                <input type='submit' value='Track This Run!'>
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