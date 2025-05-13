@extends('layouts.master')

<link rel="stylesheet" href="{{asset("css/register.css")}}">


@section('content')
<div class="register-page">
    <div class="form-container">
        <h2>Regisztráció</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Név -->
            <div class="input-group">
                <label for="name">Név</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="@error('name') is-invalid @enderror">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="input-group">
                <label for="email">Email cím</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="@error('email') is-invalid @enderror">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jelszó -->
            <div class="input-group">
                <label for="password">Jelszó</label>
                <input id="password" type="password" name="password" required class="@error('password') is-invalid @enderror">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jelszó megerősítése -->
            <div class="input-group">
                <label for="password_confirmation">Jelszó megerősítése</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <!-- Gomb -->
            <button type="submit" class="submit-btn">Regisztráció</button>
        </form>
    </div>
</div>
@endsection

