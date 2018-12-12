@extends('layouts.master')

@section('content')
    <section>
        @include('layouts.homeheader')
    </section>

    <h4>Register</h4>
    <div class='defForm'>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class='elForm'>
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class='elForm'>
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class='elForm'>
            <label for='password'>Password (min: 6)</label>
            <input id='password' type='password' name='password' required>
        </div>

        <div class='elForm'>
            <label for='password-confirm'>Confirm Password</label>
            <input id='password-confirm' type='password' name='password_confirmation' required>
        </div>
        <button type='submit'>Register</button>

    </form>
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
