@extends('layouts.master')

@section('content')
    <section>
        @include('layouts.homeheader')
    </section>
    </div>

    <div class='defForm'>
        <h2>Welcome to the Race Training Planner.</h2>
        There's not much here now, but you can:
        <ul>
            @foreach(config('app.nav') as $navitem)
                @if($navitem['label']!='Home')
                    <li><a href="{{$navitem['link']}}">{{$navitem['label']}}</a>: {{$navitem['description']}}</li>
                @endif
            @endforeach
            @if (Auth::check())
                @foreach(config('app.authnav') as $nav2)
                        <li><a href="{{$nav2['link']}}">{{$nav2['label']}}</a>: {{$nav2['description']}}</li>
                @endforeach

            @endif
        </ul>
    </div>

@endsection
