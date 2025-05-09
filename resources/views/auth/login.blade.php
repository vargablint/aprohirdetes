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

<style>
    /* Alap reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Alap háttér és betűtípus */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f4f7fc;
}

/* Csak a bejelentkezési oldalra vonatkozó stílusok */
.login-page {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Űrlap dizájn */
.login-page .form-container {
    background-color: #ffffff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
}

/* Cím */
.login-page h2 {
    margin-bottom: 1rem;
    color: #333;
    font-size: 1.5rem;
}

/* Input mezők */
.login-page .input-group {
    margin-bottom: 1rem;
    text-align: left;
}

.login-page .input-group label {
    font-size: 0.9rem;
    color: #555;
    margin-bottom: 0.5rem;
    display: block;
}

.login-page .input-group input {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
}

/* Checkbox */
.login-page .checkbox-group {
    margin-bottom: 1rem;
    text-align: left;
}

.login-page .checkbox-group label {
    font-size: 0.9rem;
    color: #555;
}

/* Hibaüzenet */
.login-page .error {
    color: #ff0000;
    font-size: 0.9rem;
    margin-top: 0.5rem;
}

/* Gomb */
.login-page .submit-btn {
    width: 100%;
    padding: 0.8rem;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.login-page .submit-btn:hover {
    background-color: #45a049;
}

.login-page .submit-btn:focus {
    outline: none;
}

/* Elfelejtett jelszó link */
.login-page .forgot-password {
    display: inline-block;
    margin-top: 1rem;
    font-size: 0.9rem;
    color: #007bff;
    text-decoration: none;
}

.login-page .forgot-password:hover {
    text-decoration: underline;
}

/* Reszponzív dizájn mobil eszközökhöz */
@media (max-width: 480px) {
    .login-page .form-container {
        padding: 1.5rem;
    }
}
</style>
@endsection
