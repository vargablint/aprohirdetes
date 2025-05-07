@extends('layouts.master') {{-- vagy a saját layoutod --}}

@section('content')
    <div class="container">
        <h2>Hirdetés feladása</h2>

        {{-- Hibák megjelenítése --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Sikeres mentés üzenet --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif




        <div class="container">
            <!-- Form -->
            <form action="{{ route('hirdetesek.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Fénykép feltöltés -->
                <div class="form-box text-center">
                    <label for="kep" class="btn btn-primary">Fénykép feltöltés</label>
                    <input type="file" id="kep" name="kep" class="d-none" accept="image/*">
                    <div id="preview-container" class="mt-3" style="display: none;">
                        <p class="text-success">Sikeresen feltöltve:</p>
                        <img id="preview-image" src="#" alt="Előnézet"
                            style="max-width: 100%; max-height: 300px; border-radius: 10px;">
                    </div>
                </div>

                <!-- Cím és Leírás egy dobozban -->
                <div class="form-box">
                    <label for="title" class="form-label">Cím</label>
                    <input type="text" id="title" name="title" class="form-control"
                        placeholder="Pl. Fehér adidas póló">

                    <hr>

                    <label for="leiras" class="form-label">Adj leírást a termékedről</label>
                    <textarea id="leiras" name="leiras" rows="4" class="form-control"
                        placeholder="Pl. Picit viseltes, de jó állapotú..."></textarea>
                </div>


                <div class="form-box">
                    <label for="kategoria_id" class="form-label">Kategória</label>
                    <select name="kategoria_id" class="form-select" required>
                        <option value="">Válassz kategóriát</option>
                        {{-- Feltételezzük, hogy a $kategoriak tömböt a controller küldi át --}}
                        @foreach ($kategoriak as $kategoria)
                            <option value="{{ $kategoria->kategoria_id }}">{{ $kategoria->nev }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Település -->
                <div class="form-box">
                    <label for="telepules_id" class="form-label">Település</label>
                    <select name="telepules_id" id="telepules_id" class="form-select">
                        @foreach ($telepulesek as $telepules)
                            <option value="{{ $telepules->telepules_id }}">{{ $telepules->nev }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Ár -->
                <div class="form-box">
                    <label for="ar" class="form-label">Ár</label>
                    <div class="input-group">
                        <input type="number" id="ar" name="ar" class="form-control" placeholder="Pl. 10000">
                        <span class="input-group-text">Ft</span>
                    </div>
                </div>

                <!-- Feltöltés gomb -->
                <div class="text-center">
                    <button class="btn btn-success btn-lg" type="submit">Feltöltés</button>
                </div>
            </form>
        </div>
    @endsection
