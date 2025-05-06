@extends('layouts.app')

@section('content')
    <h1>Hirdetések</h1>

    @foreach ($hirdetesek as $hirdetes)
        <div class="card mb-3">
            <div class="card-body">
                <h3>{{ $hirdetes->title }}</h3>
                <p>{{ $hirdetes->leiras }}</p>
                <p><strong>Ár:</strong> {{ $hirdetes->ar }} Ft</p>
                <p><strong>Kategória:</strong> {{ $hirdetes->kategoria->nev ?? 'N/A' }}</p>
                <p><strong>Település:</strong> {{ $hirdetes->telepules->nev ?? 'N/A' }}</p>
                <p><strong>Hirdető:</strong> {{ $hirdetes->felhasznalo->name ?? 'N/A' }}</p>
            </div>
        </div>
    @endforeach
@endsection
