@extends('layout.app')

@section('content')
    <form action="/login" method="post">
        @csrf
        <input type="email" name="email" id="email" placeholder="email">
        <input type="password" name="password" id="password" placeholder="password">
        <button type="submit">Login</button>
        
        <br>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </form>
@endsection
