@extends('layout.app')

@section('content')
    <form action="/logout" method="get">
        @csrf
        @if (auth()->check())
            <h1>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
        @endif
        <button type="submit">Logout</button>
    </form>
@endsection
