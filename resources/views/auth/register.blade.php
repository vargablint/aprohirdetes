@extends('layouts.master')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Név mező -->
    <div>
        <label for="name">Név</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
    </div>

    <!-- Email mező -->
    <div>
        <label for="email">Email cím</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <!-- Jelszó mező -->
    <div>
        <label for="password">Jelszó</label>
        <input id="password" type="password" name="password" required>
    </div>

    <!-- Jelszó megerősítése mező -->
    <div>
        <label for="password_confirmation">Jelszó megerősítése</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>


    <button type="submit">Regisztrálás</button>
</form>
@endsection
