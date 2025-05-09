@extends('layouts.master')

@section('content')
@foreach($hirdetesek as $hirdetes)
    <div class="row g-4 justify-content-center">
        <!-- Hirdetés kártya -->
        <div class="col-3">
            <div class="card h-100 d-flex flex-column">
                <div class="card-header text-center">
                    <img src="{{asset('images/profilkép.jpg')}}" alt="Profilkép" class="rounded-circle" style="width: 50px; height: 50px;">
                </div>
               
                <img src="{{ asset('storage/' . ($hirdetes->kepek->first()->image_path ?? 'kepek/polo.png')) }}" class="card-img-top" alt="Termék képe">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title">{{ $hirdetes->title }}</h5>
                    <p class="card-text mt-0">Ár: {{ $hirdetes->ar }} Ft</p>
                    
                   
                    
                    <form action="{{ route('kosar.hozzaad', ['id' => $hirdetes->hirdetesek_id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="hirdetesek_id" value="{{ $hirdetes->id }}">
                        <button type="submit" class="btn btn-primary mt-3">Megveszem</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
