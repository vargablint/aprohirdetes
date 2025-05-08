@extends('layouts.master')

@section('content')
<h2>Felhasználók listája</h2>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Név</th>
            <th>Email</th>
            <th>Statusz</th>
            <th>Műveletek</th>
        </tr>
    </thead>
    <tbody>
        @if($users != null)
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin ? 'Admin' : 'Felhasználó' }}</td> <!-- Admin státusz -->
                <td>
                    <a href="{{ route('admin.user.edit', $user->user_id) }}" class="btn btn-primary">Szerkesztés</a>
                    @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Biztos törlöd?')">Törlés</button>
                    </form>
                </td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection
