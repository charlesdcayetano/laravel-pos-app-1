@extends('layouts.app')

@section('content-header', 'PAYMENT METHODS')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <div class="table-actions">
                <div class="row m-0">
                    <a href="{{ route('payment-methods.create') }}" class="btn action-btn add-btn col-auto">Add
                        Method</a>
                    <div class="search-area col-auto p-0">
                        <form action="" method="GET" class="row g-2">
                            @csrf
                            <div class="col-auto">
                                <input type="text" name="search" class="form-control search-input" placeholder="Search">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn action-btn search-btn">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-subtitle mt-2">
                @include('includes.messages')
            </div>
        </div>
        <div class="card-body card-table">
            @if (count($paymentMethods) > 0)
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paymentMethods as $paymentMethod)
                            @if ($paymentMethod->is_deleted === 0)
                                <tr>
                                    <td>{{ $paymentMethod->name }}</td>
                                    <td>{{ $paymentMethod->created_at->diffForHumans() }}</td>
                                    <td>{{ $paymentMethod->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('payment-methods.edit', $paymentMethod->id) }}"
                                            class="btn action-btn edit-btn">
                                            <i class="material-symbols-outlined material-icon">edit_square</i>
                                        </a>
                                        <a href="#" class="btn action-btn delete-btn"
                                            onclick="
                                            document.getElementById('delete-payment-method-form').action = '{{ route('payment-methods.destroy', $paymentMethod->id) }}';
                                            document.getElementById('delete-payment-method-form').submit();
                                        ">
                                            <i class="material-symbols-outlined material-icon">delete</i>
                                            <form method="post" id="delete-payment-method-form">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">No Payment Methods Found.</p>
            @endif
        </div>
        <div class="card-footer">
            {{ $paymentMethods->withQueryString()->links() }}
        </div>
    </div>
@endsection
