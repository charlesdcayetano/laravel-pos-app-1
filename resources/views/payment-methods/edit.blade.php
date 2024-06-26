@extends('layouts.app')

@section('title', 'Edit Payment Method')
@section('content-header', 'EDIT PAYMENT METHOD')   
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <h5 class="card-title">
                Payment Method Details
            </h5>
        </div>
        <form action="{{ route('payment-methods.update', $paymentMethod->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body card-form">
                <div class="row g-3">
                    {{-- Name --}}
                    <div class="col-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $paymentMethod->name }}">
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
