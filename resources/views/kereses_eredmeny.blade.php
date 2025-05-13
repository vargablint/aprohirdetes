@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">Keresés eredménye:</h2>

    @if($hirdetesek->isEmpty())
        <p class="text-center">{{ $uzenet ?? 'Nincs találat.' }}</p>
    @else
        <div class="row g-4 justify-content-center">
            @foreach($hirdetesek as $hirdetes)
            <div class="col-3">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-header text-center">
                        <img src="{{ asset('images/profilkép.jpg') }}" alt="Profilkép" class="rounded-circle" style="width: 50px; height: 50px;">
                    </div>
                    <img src="{{ asset('images/' . ($hirdetes->image ?: 'polo.png')) }}" class="card-img-top" alt="Termék képe">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">{{ $hirdetes->title }}</h5>
                        <p class="card-text">Ár: {{ $hirdetes->ar }} Ft</p>
                        <form action="{{ route('kosar.hozzaad', ['id' => $hirdetes->hirdetesek_id]) }}" method="POST">
                            @csrf
                            <button class="btn btn-primary mt-2">Megveszem</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection