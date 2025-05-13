@extends('layouts.master')



@section('content')
    <h1>Hirdetések</h1>

    @foreach($hirdetesek as $hirdetes)
        <div>
            <h2>{{ $hirdetesek->title }}</h2>
            <p>{{ $hirdetesek->leiras }}</p>
        </div>
    @endforeach
@endsection