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
                <label>Last Name:&nbsp;
                    <input type='text' name='lastname' value=''>
                </label>
            </div>
            <div class='elForm'><label>Gender:
                    <select name='endurance'>
                        <option value='' >
                            Select One
                        </option>
                        <option value='F'>
                            Female
                        </option>
                        <option value='M'>
                            Male
                        </option>
                    </select>
                </label></div>
            <div class='elForm'>Current Mile Pace:&nbsp;
                <label>Minutes <input type='number' name='minutes' min='0' max='60' size='2'>
                </label>
                <label>Seconds <input type='number' name='seconds' min='0' max='60' size='2'>
                </label></div>

            <div class='elForm'>Target Mile Pace:&nbsp;
                <label>Minutes <input type='number' name='targetmin' min='0' max='60' size='2>'
                </label>
                <label>Seconds <input type='number' name='targetsec' min='0' max='60' size='2'>
                </label></div>

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