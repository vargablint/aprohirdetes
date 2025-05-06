@extends('layouts.app') <!-- vagy amilyen layoutod van -->

@section('content')
<div class="container">
    <h2>Kategória #{{ $id }}</h2>
    <p>{{ $tartalom }}</p>
</div>
@endsection
