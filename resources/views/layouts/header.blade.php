<div class='nav'>
    <h1>Race Training Planner</h1>
    @foreach(config('app.nav') as $navitem)
        <a href="{{$navitem['link']}}">{{$navitem['label']}}</a>
    @endforeach
</div>