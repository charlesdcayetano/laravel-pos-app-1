@extends('layouts.app')

@section('title', 'Add Roles')
@section('content-header', 'CREATE ROLES')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <h5 class="card-title">
                Roles Details
            </h5>
        </div>
        <form action="{{ route('roles.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="row g-3">
                    {{-- Role --}}
                    <div class="col-12">
                        <label for="name" class="form-label">Role</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn action-btn save-btn">Save</button>
                <a href="{{ route('roles.index') }}" class="btn action-btn cancel-btn">Go Back</a>
            </div>
        </form>
    </div>
@endsection
