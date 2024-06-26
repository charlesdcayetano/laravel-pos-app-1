@extends('layouts.app')

@section('content-header', 'Category')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <div class="table-actions">
                <div class="row m-0">
                    <a href="{{ route('categories.create') }}" class="btn action-btn add-btn col-auto">Add Category</a>
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
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        {{-- @if ($user->is_deleted == 0) --}}
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td>{{ $category->updated_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn action-btn edit-btn">
                                    <i class="material-symbols-outlined material-icon">edit_square</i>
                                </a>
                                <a href="#" class="btn action-btn delete-btn"
                                    onclick="
                                        document.getElementById('delete-category-form').action = '{{ route('categories.destroy', $category->id) }}';
                                        document.getElementById('delete-category-form').submit();
                                    ">
                                    <i class="material-symbols-outlined material-icon">delete</i>
                                    <form method="post" id="delete-category-form">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </a>
                            </td>
                        </tr>
                        {{-- @endif --}}
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $categories->withQueryString()->links() }}
        </div>
    </div>
@endsection
