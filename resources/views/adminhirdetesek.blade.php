@extends('layouts.master')

@section('content')
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>

                        <th>Cím</th>
                        <th>Leírás</th>
                        <th>Ár</th>
                        <th>Státusz</th>
                        <th>Akciók</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hirdetesek as $hirdetes)
    <tr>
        <td>{{ $hirdetes->title }}</td>
        <td>{{ $hirdetes->leiras }}</td>
        <td>{{ number_format($hirdetes->ar, 0, ',', ' ') }} Ft</td>
        <td>
            @if($hirdetes->status === 'aktiv')
                <span class="badge bg-success">Aktív</span>
            @else
                <span class="badge bg-secondary">{{ ucfirst($hirdetes->status) }}</span>
            @endif
        </td>
        <td>
            <form action="{{ route('hirdetesek.torles', $hirdetes->hirdetesek_id) }}" method="POST" onsubmit="return confirm('Biztos, hogy törölni szeretnéd ezt a hirdetést?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Törlés</button>
                <td>
                    <a href="{{ route('hirdetesek.szerkesztes', $hirdetes->hirdetesek_id) }}" class="btn btn-sm btn-warning">Szerkesztés</a>
                </td>
            </form>
        </td>
    </tr>
@endforeach
                </tbody>
            </table>
        </div>
@endsection