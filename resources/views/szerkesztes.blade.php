@extends('layouts.master')

@section('content')
<h2>Hirdetés szerkesztése</h2>

<form method="POST" action="{{ route('hirdetesek.frissites', $hirdetes->hirdetesek_id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title">Cím</label>
        <input type="text" name="title" value="{{ old('title', $hirdetes->title) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="leiras">Leírás</label>
        <textarea name="leiras" class="form-control" required>{{ old('leiras', $hirdetes->leiras) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="ar">Ár</label>
        <input type="number" name="ar" value="{{ old('ar', $hirdetes->ar) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="status">Státusz</label>
        <select name="status" class="form-control" required>
            <option value="aktiv" {{ $hirdetes->status == 'aktiv' ? 'selected' : '' }}>Aktív</option>
            <option value="szuneteltetve" {{ $hirdetes->status == 'szuneteltetve' ? 'selected' : '' }}>Szüneteltetve</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Frissítés</button>
    <a href="{{ route('admin.hirdetesek') }}" class="btn btn-secondary">Vissza</a>
</form>
@endsection
