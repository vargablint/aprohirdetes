@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="row g-4 justify-content-center">
        @foreach($hirdetesek as $hirdetes)
        <div class="col-md-4 col-lg-3">
            <div class="card h-100 d-flex flex-column shadow-sm">
    <div class="card-header text-center">
        <img src="{{ asset('images/profilkép.jpg') }}" alt="Profilkép" class="rounded-circle" style="width: 50px; height: 50px;">
    </div>
    <div class="card-img-container" style="height: 380px; overflow: hidden;">
        <img src="{{ asset('images/polo.png') }}" class="card-img-top" alt="Termék képe" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div class="card-body d-flex flex-column justify-content-between">
        <h5 class="card-title">{{ $hirdetes->title }}</h5>
        <p class="card-text">Ár: {{ $hirdetes->ar }} Ft</p>
        <form action="{{ route('kosar.hozzaad', ['id' => $hirdetes->hirdetesek_id]) }}" method="POST">
            @csrf
            <input type="hidden" name="hirdetesek_id" value="{{ $hirdetes->id }}">
            <button type="submit" class="btn btn-primary mt-3 w-100">Megveszem</button>
        </form>
    </div>
</div>
        </div>
        @endforeach
    </div>
</div>
@endsection
