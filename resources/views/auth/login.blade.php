@extends('layouts.master')

@section('content')
    <section>
        @include('layouts.homeheader')
    </section>

    <div class='defForm'>
        <h2>Login</h2>
            Don't have an account? <a href='/register'>Register here...</a>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class='elForm'>
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class='elForm'>
                <label for="password" >{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required>
            </div>

            <div class='elForm'>
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember"> {{ __('Remember Me') }}</label>
                    </div>
            <div class='elForm'>
                    <button type="submit" >{{ __('Login') }}</button>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    @endif
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
