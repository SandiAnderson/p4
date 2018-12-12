@if (!Auth::check())
    <div class='nav2'>
        @foreach(config('app.home') as $nav2)
            <a href="{{$nav2['link']}}">{{$nav2['label']}}</a>
    @endforeach
@endif
