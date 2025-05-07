@extends('layouts.master')
@section('title','csapatnev')
@section('content')
<div class="container mt-5 mb-5" style="order: 2;"> <!-- Margó hozzáadása a tartalom aljához, hogy a lábléc ne ragadjon hozzá -->
    <!-- Középre igazított nagy kocka mosolygós képpel és szöveggel -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div id="sell-item" class="card text-center shadow-lg p-5" style="border-radius: 20px;">
                <div class="card-body">
                    <p class="card-text">Ha el szeretnél adni egy terméket, akkor az alábbi Eladás gombra kattintva megteheted.</p>
                    <a href="{{ route('eladas') }}" class="btn btn-success btn-lg">Eladás</a>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5">
    <h2 class="text-center mb-4">Legnépszerűbb termékek</h2>

    
    <div class="row g-4 justify-content-center">
        @if (count($hirdetesek) <= 0)
        <p class="text-center">Jelenleg nincsenek legnépszerűbb termékek.</p>
            
        @else        
        @foreach($hirdetesek as $hirdetes)
        <div class="col-3">
            <div class="card h-100 d-flex flex-column">
                <div class="card-header text-center">
                    <img src="{{asset('images/profilkép.jpg')}}" alt="Profilkép" class="rounded-circle" style="width: 50px; height: 50px;">
                </div>
                <!--<img src="{{asset('images/polo.png')}}" class="card-img-top" alt="Termék képe">-->
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
        @endif
    </div>
    
    
    
</div>