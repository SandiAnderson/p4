@extends('layouts.master')

@section('content')
    <section>
        @include('layouts.homeheader')
    </section>
    <div class='defForm'>
        <h2>Your Profile</h2>
        <h4>View/Edit your profile.</h4>
        <p><span class='req'>*All values are required.</span></p>
        <form method='POST' action='/editprofile'>
            {{ method_field('put') }}
            {{ csrf_field() }}
            <div class='elForm'>
                <label>First Name:&nbsp;
                    <input type='text' name='firstname' value=''>
                </label>
            </div>

            <div class='elForm'>
                <input type='submit' value='Edit Profile'>
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