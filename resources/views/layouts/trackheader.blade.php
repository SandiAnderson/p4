<div class='nav2'>
    @foreach(config('app.track') as $nav2)
        <a href="{{$nav2['link']}}">{{$nav2['label']}}</a>
    @endforeach
</div>
