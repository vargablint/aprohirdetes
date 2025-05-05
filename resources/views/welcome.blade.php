@extends('layouts.master')
@section('title','csapatnev')
@section('content')

<div class="container mt-5 mb-5"> <!-- Margó hozzáadása a tartalom aljához, hogy a lábléc ne ragadjon hozzá -->
    <!-- Középre igazított nagy kocka mosolygós képpel és szöveggel -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div id="sell-item" class="card text-center shadow-lg p-5" style="border-radius: 20px;">
                <div class="card-body">
                    <p class="card-text">Ha el szeretnéd adni az árut, amit el szeretnél adni, kattints az alábbi gombra!</p>
                    <a href="{{ route('eladas') }}" class="btn btn-success btn-lg">Hozzáadom az árut</a>
                </div>
            </div>
        </div>
    </div>

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



</div>



@endsection