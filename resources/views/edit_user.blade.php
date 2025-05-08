@extends('layouts.master')

@section('content')
<h2>Felhasználó szerkesztése</h2>

<form method="POST" action="{{ route('admin.user.update', $user->user_id) }}">
    @csrf

    <div class="mb-3">
        <label for="name">Név</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="is_admin">Szerepkör</label>
        <select name="is_admin" class="form-control">
            <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>Felhasználó</option>
            <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Admin</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Mentés</button>
    <a href="{{ route('adminfelhasznalok') }}" class="btn btn-secondary">Vissza</a>
</form>
@endsection