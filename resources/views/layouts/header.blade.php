<div class='nav'>
    <h1>Race Training Planner</h1>
    @foreach(config('app.nav') as $navitem)
        <a href="{{$navitem['link']}}">{{$navitem['label']}}</a>
    @endforeach

    @if (Auth::check())
        @foreach(config('app.authnav') as $navitem)
            <a href="{{$navitem['link']}}">{{$navitem['label']}}</a>
        @endforeach
    <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
        <form method='POST' id='logout' action='/logout'>
            {{ csrf_field() }}
        </form>
    @endif
</div>