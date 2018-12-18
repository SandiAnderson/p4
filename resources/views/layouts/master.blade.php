<!doctype html>
<html lang='en'>
<head>
    <title>Running - Race Training Planner</title>
    <meta charset='utf-8'>
    <link href='/css/racetrainer.css' rel='stylesheet'>
</head>
<body>

<section>
    @include('layouts.header')
</section>

<section>
    @yield('content')
</section>


<footer>
    <hr>
    &copy; {{ date('Y') }}
</footer>

</body>
</html>