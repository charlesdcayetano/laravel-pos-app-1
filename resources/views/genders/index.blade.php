@extends('layouts.app')

@section('content-header', 'Gender')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <div class="table-actions">
                <div class="row m-0">
                    <a href="{{ route('genders.create') }}" class="btn action-btn add-btn col-auto">Add Gender</a>
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
                        <th scope="col">gender</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($genders as $gender)
                        @if ($gender->is_deleted === 0)
                            <tr>
                                <td>{{ $gender->name }}</td>
                                <td>{{ $gender->created_at->diffForHumans() }}</td>
                                <td>{{ $gender->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('genders.edit', $gender->id) }}" class="btn action-btn edit-btn">
                                        <i class="material-symbols-outlined material-icon">edit_square</i>
                                    </a>
                                    <a href="#" class="btn action-btn delete-btn"
                                        onclick="
                                        document.getElementById('delete-gender-form').action = '{{ route('genders.destroy', $gender->id) }}';
                                        document.getElementById('delete-gender-form').submit();
                                    ">
                                        <i class="material-symbols-outlined material-icon">delete</i>
                                        <form method="post" id="delete-gender-form">
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
            {{ $genders->withQueryString()->links() }}
        </div>
    </div>
@endsection
