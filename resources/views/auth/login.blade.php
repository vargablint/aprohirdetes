@extends('layouts.master')

@section('content')
<div class="login-page">
        <div class="form-container">
            <h2>Bejelentkezés</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email mező -->
                <div class="input-group">
                    <label for="email">Email cím</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="@error('email') is-invalid @enderror">

                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jelszó mező -->
                <div class="input-group">
                    <label for="password">Jelszó</label>
                    <input id="password" type="password" name="password" required class="@error('password') is-invalid @enderror">

                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Emlékezés checkbox -->
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Emlékezz rám
                    </label>
                </div>

                <!-- Gombok -->
                <button type="submit" class="submit-btn">Bejelentkezés</button>

                @if (Route::has('password.request'))
                    <a class="forgot-password" href="{{ route('password.request') }}">Elfelejtetted a jelszavad?</a>
                @endif
            </form>
        </div>
    </div>


@endsection
