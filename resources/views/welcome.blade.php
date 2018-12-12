@extends('layouts.master')

@section('content')
    <section>
        @include('layouts.homeheader')
    </section>
     </div>

        <div class='defForm'>
            <h4>Welcome to the Race Training Planner.</h4>
            There's not much here now, but you can:
            <ul>
                @foreach(config('app.nav') as $navitem)
                    @if($navitem['label']!='Home')
                        <li><a href="{{$navitem['link']}}">{{$navitem['label']}}</a>: {{$navitem['description']}}</li>
                    @endif
                @endforeach
            </ul>

        </div>

@endsection
