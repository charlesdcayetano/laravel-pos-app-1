@extends('layouts.app')

@section('content-header', 'Discount')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <div class="table-actions">
                <div class="row m-0">
                    <a href="{{ route('discounts.create') }}" class="btn action-btn add-btn col-auto">Add Discount</a>
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
            @if (count($discounts) !== 0)
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Percentage</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($discounts as $discount)
                            @if ($discount->is_deleted === 0)
                                <tr>
                                    <td>{{ $discount->percentage }}</td>
                                    <td>{{ $discount->description }}</td>
                                    <td>{{ $discount->created_at->diffForHumans() }}</td>
                                    <td>{{ $discount->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('discounts.edit', $discount->id) }}"
                                            class="btn action-btn edit-btn">
                                            <i class="material-symbols-outlined material-icon">edit_square</i>
                                        </a>
                                        <a href="#" class="btn action-btn delete-btn"
                                            onclick="
                                                document.getElementById('delete-discount-form').action = '{{ route('discounts.destroy', $discount->id) }}';
                                                document.getElementById('delete-discount-form').submit();
                                        ">
                                            <i class="material-symbols-outlined material-icon">delete</i>
                                            <form method="post" id="delete-discount-form">
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
                <p class="mt-4 text-center">No Discounts Found</p>
            @endif
        </div>
        <div class="card-footer">
            {{ $discounts->withQueryString()->links() }}
        </div>
    </div>
@endsection
