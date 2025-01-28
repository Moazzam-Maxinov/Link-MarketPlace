@extends('layouts.admin.admin')

@section('content')
    <h2>Welcome to the Admin Dashboard!</h2>
    <p>Manage your platform here.</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-red-500">Logout</button>
    </form>
@endsection
