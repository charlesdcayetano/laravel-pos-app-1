@extends('layouts.app')

@section('title', 'Edit Discount')
@section('content-header', 'EDIT DISCOUNT')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <h5 class="card-title">
                Discount Details
            </h5>
        </div>
        <form action="{{ route('discounts.update', $discount->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body card-form">
                <div class="row g-3">
                    {{-- Percentage --}}
                    <div class="col-12 col-md-6">
                        <label for="percentage" class="form-label">Percentage</label>
                        <input type="text" name="percentage" id="percentage" class="form-control"
                            value="{{ $discount->percentage }}">
                        @error('percentage')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="col-12 col-md-6">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control"
                            value="{{ $discount->description }}">
                        @error('description')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn action-btn save-btn">Save</button>
                <a href="{{ route('discounts.index') }}" class="btn action-btn cancel-btn">Go Back</a>
            </div>
        </form>
    </div>
@endsection
