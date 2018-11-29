@extends('layouts.master')


@section('content')
    <section>
        @include('layouts.trackheader')
    </section>


    <div class='defForm'>
        <form method='get' action='/searchusers'>
            <div class='elForm'>
                <label>Search Users&nbsp;
                    <input type='text' name='searchusers'
                            @include('modules.displayvalue', ['type'=>'text', 'source'=>'searchusers'])>
                </label>
            </div>
            <div class='elForm'>
                <input type='submit' value='Search Users'>
            </div>
        </form>

            <hr>
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
        <table>
            <thead>
            <tr>
                <td>Run Date</td>
                <td>Run Distance</td>
                <td>Run Pace: Min</td>
                <td>Run Pace: Sec</td>
            </tr>
            </thead>


        </table>
    @endif

@endsection