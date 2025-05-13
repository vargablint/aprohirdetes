@extends('layouts.master')



@section('content')
    <div class="container">
        <div class="form-container">
            <h2>Regisztrálj nálunk!</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
    <div class="container">
        <div class="form-container">
            <h2>Regisztrálj nálunk!</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Név mező -->
                <div class="input-group">
                    <label for="name">Név</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Név mező -->
                <div class="input-group">
                    <label for="name">Név</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email mező -->
                <div class="input-group">
                    <label for="email">Email cím</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Email mező -->
                <div class="input-group">
                    <label for="email">Email cím</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jelszó mező -->
                <div class="input-group">
                    <label for="password">Jelszó</label>
                    <input id="password" type="password" name="password" required>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Jelszó mező -->
                <div class="input-group">
                    <label for="password">Jelszó</label>
                    <input id="password" type="password" name="password" required>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jelszó megerősítése mező -->
                <div class="input-group">
                    <label for="password_confirmation">Jelszó megerősítése</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                </div>
                <!-- Jelszó megerősítése mező -->
                <div class="input-group">
                    <label for="password_confirmation">Jelszó megerősítése</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                </div>

                <button type="submit" class="submit-btn">Regisztrálás</button>
            </form>
        </div>
    </div>


@endsection
