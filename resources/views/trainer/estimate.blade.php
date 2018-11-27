@extends('layouts.master')

@section('content')
    <div class='defForm'>
        <h4>Use this calculator to estimate your race finish time based
            on your current pace and the type of race you will be running.</h4>
        <p><span class='req'>*All values are required.</span></p>
        <form method='get' action='/calc'>

            <div class='elForm'>Current Mile Pace:&nbsp;
                <label>Minutes <input type='number' name='minutes' min='0' max='60' size='2'
                            @include('modules.displayvalue', ['type'=>'number', 'source'=>'minutes'])>
                </label>
                <label>Seconds <input type='number' name='seconds' min='0' max='60' size='2'
                            @include('modules.displayvalue', ['type'=>'number', 'source'=>'seconds'])>
                </label></div>

            <div class='elForm'><label>Distance:
                    <select name='distance'>
                        <option value=''>
                            Select One
                        </option>
                        <option value='fivek' @include('modules.displayvalue', ['type'=>'select', 'source'=>'distance', 'value'=>'fivek'])>
                            5K
                        </option>
                        <option value='half' @include('modules.displayvalue', ['type'=>'select', 'source'=>'distance', 'value'=>'half'])>
                            Half Marathon
                        </option>
                        <option value='full' @include('modules.displayvalue', ['type'=>'select', 'source'=>'distance', 'value'=>'full'])>
                            Full Marathon
                        </option>
                    </select>
                </label></div>

            <div class='elForm'><label>Course Type:
                    <select name='endurance'>
                        <option value='' @include('modules.displayvalue', ['type'=>'select', 'source'=>'endurance', 'value'=>''])>
                            Select One
                        </option>
                        <option value='flat' @include('modules.displayvalue', ['type'=>'select', 'source'=>'endurance', 'value'=>'flat'])>
                            Fast and Flat
                        </option>
                        <option value='hill' @include('modules.displayvalue', ['type'=>'select', 'source'=>'endurance', 'value'=>'hill'])>
                            Some Hills
                        </option>
                        <option value='elevate' @include('modules.displayvalue', ['type'=>'select', 'source'=>'endurance', 'value'=>'elevate'])>
                            Steep Elevation
                        </option>
                        <option value='obstacle' @include('modules.displayvalue', ['type'=>'select', 'source'=>'endurance', 'value'=>'obstacle'])>
                            Obstacle Run
                    </select>
                </label></div>

            <div class='elForm'>Are you training?
                <label for='yes'><input type='radio' name='training' id='yes'
                                        @include('modules.displayvalue', ['type'=>'radio', 'source'=>'training', 'value'=>'yes'])
                                        value='yes'>Yes
                </label>
                <label for='no'><input type='radio' name='training' id='no'
                                       @include('modules.displayvalue', ['type'=>'radio', 'source'=>'training', 'value'=>'no'])
                                       value='no'>No
                </label></div>
            <div class='elForm'>
                <input type='submit' value='Estimate Race Time'>
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
        @if(session('ftime'))
            <div class='time'>Your anticipated completion time is {{session('ftime')}}</div>
        @endif

    @endif
@endsection