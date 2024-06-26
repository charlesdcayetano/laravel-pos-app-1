@extends('layouts.app')

@section('title', 'Edit ROLES')
@section('content-header', 'EDIT Roles')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <h5 class="card-title">
                Roles Details
            </h5>
        </div>
        <form action="{{ route('roles.update', $role->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body card-form">
                <div class="row g-3">
                    <div class="col-12">
                        <label for="name" class="form-label">Role</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $role->name }}">
                        @error('name')
                            <span class="text-danger text-sm">The role field is required.</span>
                        @enderror
                    </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn action-btn save-btn">Save</button>
                <a href="{{ route('roles.index') }}" class="btn action-btn cancel-btn">Go Back</a>
            </div>
        </form>
    </div>
@endsection
