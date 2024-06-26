@extends('layouts.app')

@section('title', 'Add Payment Method')
@section('content-header', 'CREATE PAYMENT METHOD')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <h5 class="card-title">
                Payment Method Details
            </h5>
        </div>
        <form action="{{ route('payment-methods.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="row g-3">
                    {{-- Name --}}
                    <div class="col-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn action-btn save-btn">Save</button>
                <a href="{{ route('payment-methods.index') }}" class="btn action-btn cancel-btn">Go Back</a>
            </div>
        </form>
    </div>
@endsection
