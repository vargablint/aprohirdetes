@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Kosár tartalma</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($kosar) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Termék</th>
                    <th>Ár</th>
                    <th>Mennyiség</th>
                    <th>Összesen</th>
                    <th>Művelet</th>
                </tr>
            </thead>
            <tbody>
                @php $osszeg = 0; @endphp
                @foreach($kosar as $item)
                    @php $osszeg += $item['ar'] * $item['quantity'];                   
                    @endphp
                    <tr>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['ar'] }} Ft</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['ar'] * $item['quantity'] }} Ft</td>
                        <td>
                        <form action="{{ route('kosar.torol',['id'=> $item['id']]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eltávolítás</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end">
            <h4>Végösszeg: {{ $osszeg }} Ft</h4>
        </div>
    @else
        <p>A kosarad üres.</p>
    @endif
</div>
@endsection
