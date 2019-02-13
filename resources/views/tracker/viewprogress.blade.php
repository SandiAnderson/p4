@extends('layouts.master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/1.28.5/date_fns.min.js"></script>

@section('content')
    <section>
        @include('layouts.trackheader')
    </section>
    <h2>View Progress</h2>


    <div class='defForm'>
        <div id="cnvs" height="400" height="300" align="center" border="1">
            <canvas id="c1" width="400" height="300" border="1">
            </canvas>
        </div>

    </div>
    <script type="text/javascript" src="js/progress.js"></script>
@endsection