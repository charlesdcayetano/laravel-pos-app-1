@extends('layouts.app')

@section('title', 'Add Gender')
@section('content-header', 'CREATE GENDER')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <h5 class="card-title">
                Gender Details
            </h5>
        </div>
        <form action="{{ route('genders.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="row g-3">
                    {{-- Gender --}}
                    <div class="col-12">
                        <label for="name" class="form-label">Gender</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger text-sm">The gender field is required.</span>
                        @enderror
                    </div>        
            <div class="card-footer text-end">
                <button type="submit" class="btn action-btn save-btn">Save</button>
                <a href="{{ route('genders.index') }}" class="btn action-btn cancel-btn">Go Back</a>
            </div>
        </form>
    </div>
@endsection
