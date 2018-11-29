@extends('layouts.master')

@section('content')
    <section>
        @include('layouts.trackheader')
    </section>
    <div class='defForm'>
        <h4>Use the tracker to log your runs and track your incremental improvement each
            week in order to meet your race pace goal.</h4>

        <p><span class='req'>*All values are required.</span></p>
        <form method='get' action='/trackrun'>

            <div class='elForm'>
                <label>Run Date?&nbsp;
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
                    <select name='rundistance'>
                        <option value=''>
                            Select One
                        </option>
                        <option value='fivek' @include('modules.displayvalue', ['type'=>'select', 'source'=>'rundistance', 'value'=>'fivek'])>
                            5K
                        </option>
                        <option value='tenk' @include('modules.displayvalue', ['type'=>'select', 'source'=>'rundistance', 'value'=>'fivek'])>
                            10K
                        </option>
                        <option value='half' @include('modules.displayvalue', ['type'=>'select', 'source'=>'rundistance', 'value'=>'half'])>
                            Half Marathon
                        </option>
                        <option value='full' @include('modules.displayvalue', ['type'=>'select', 'source'=>'rundistance', 'value'=>'full'])>
                            Full Marathon
                        </option>
                    </select>
                </label></div>

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