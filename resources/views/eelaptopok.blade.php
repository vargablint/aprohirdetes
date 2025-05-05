@extends('layouts.master')

@section('content')
<div class="row g-4 justify-content-center">
    <!-- Első kártya -->
    <div class="col-3">
        <div class="card h-100 d-flex flex-column">
            <div class="card-header text-center">
                <img src="{{asset('images/profilkép.jpg')}}" alt="Profilkép" class="rounded-circle" style="width: 50px; height: 50px;">
            </div>
            <img src="{{asset('images/polo.png')}}" class="card-img-top" alt="Termék képe">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">Kategória: Elektronika</h5>
                <p class="card-text mt-0">Ár: 15,000 Ft</p>
            </div>
        </div>
    </div>

    <!-- Második kártya -->
    <div class="col-3">
        <div class="card h-100 d-flex flex-column">
            <div class="card-header text-center">
                <img src="{{asset('images/profilkép.jpg')}}" alt="Profilkép" class="rounded-circle" style="width: 50px; height: 50px;">
            </div>
            <img src="{{asset('images/polo.png')}}" class="card-img-top" alt="Termék képe">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">Kategória: Ruházat</h5>
                <p class="card-text mt-0">Ár: 8,500 Ft</p>
            </div>
        </div>
    </div>

    <!-- Harmadik kártya -->
    <div class="col-3">
        <div class="card h-100 d-flex flex-column">
            <div class="card-header text-center">
                <img src="{{asset('images/profilkép.jpg')}}" alt="Profilkép" class="rounded-circle" style="width: 50px; height: 50px;">
            </div>
            <img src="{{asset('images/polo.png')}}" class="card-img-top" alt="Termék képe">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">Kategória: Otthon</h5>
                <p class="card-text mt-0">Ár: 12,000 Ft</p>
            </div>
        </div>
    </div>
</div>
</br>
<div class="row g-4 justify-content-center">
    <!-- Első kártya -->
    <div class="col-3">
        <div class="card h-100 d-flex flex-column">
            <div class="card-header text-center">
                <img src="{{asset('images/profilkép.jpg')}}" alt="Profilkép" class="rounded-circle" style="width: 50px; height: 50px;">
            </div>
            <img src="{{asset('images/polo.png')}}" class="card-img-top" alt="Termék képe">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">Kategória: Elektronika</h5>
                <p class="card-text mt-0">Ár: 15,000 Ft</p>
            </div>
        </div>
    </div>

    <!-- Második kártya -->
    <div class="col-3">
        <div class="card h-100 d-flex flex-column">
            <div class="card-header text-center">
                <img src="{{asset('images/profilkép.jpg')}}" alt="Profilkép" class="rounded-circle" style="width: 50px; height: 50px;">
            </div>
            <img src="{{asset('images/polo.png')}}" class="card-img-top" alt="Termék képe">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">Kategória: Ruházat</h5>
                <p class="card-text mt-0">Ár: 8,500 Ft</p>
            </div>
        </div>
    </div>

    <!-- Harmadik kártya -->
    <div class="col-3">
        <div class="card h-100 d-flex flex-column">
            <div class="card-header text-center">
                <img src="{{asset('images/profilkép.jpg')}}" alt="Profilkép" class="rounded-circle" style="width: 50px; height: 50px;">
            </div>
            <img src="{{asset('images/polo.png')}}" class="card-img-top" alt="Termék képe">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">Kategória: Otthon</h5>
                <p class="card-text mt-0">Ár: 12,000 Ft</p>
            </div>
        </div>
    </div>
</div>
@endsection
