@extends('layouts.app')

@section('content-header', 'SUPPLIERS')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <div class="table-actions">
                <div class="row m-0">
                    <a href="{{ route('suppliers.create') }}" class="btn action-btn add-btn col-auto">Add Supplier</a>
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
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Company Name</th>
                        <th scope="col">Contact Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Region</th>
                        <th scope="col">Postal Code</th>
                        <th scope="col">Country</th>
                        <th scope="col">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        @if ($supplier->is_deleted == 0)
                            <tr>
                                <td>{{ $supplier->company_name }}</td>
                                <td>{{ $supplier->contact_name }}</td>
                                <td>{{ $supplier->address }}</td>
                                <td>{{ $supplier->city }}</td>
                                <td>{{ $supplier->region }}</td>
                                <td>{{ $supplier->postal_code }}</td>
                                <td>{{ $supplier->country }}</td>
                                <td>{{ $supplier->phone }}</td>
                                <td>
                                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn action-btn edit-btn">
                                        <i class="material-symbols-outlined material-icon">edit_square</i>
                                    </a>
                                    <a href="#" class="btn action-btn delete-btn"
                                        onclick="
                                        document.getElementById('delete-supplier-form').action = '{{ route('suppliers.destroy', $supplier->id) }}';
                                        document.getElementById('delete-supplier-form').submit();
                                    ">
                                        <i class="material-symbols-outlined material-icon">delete</i>
                                        <form method="post" id="delete-supplier-form">
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
        </div>
        <div class="card-footer">
            {{ $suppliers->withQueryString()->links() }}
        </div>
    </div>
@endsection
