@extends('layouts.app')

@section('content-header', 'Roles')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <div class="table-actions">
                <div class="row m-0">
                    <a href="{{ route('roles.create') }}" class="btn action-btn add-btn col-auto">Add Roles</a>
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
            @if (count($roles) > 0)
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Roles</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        @if ($role->is_deleted === 0)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->created_at->diffForHumans() }}</td>
                                <td>{{ $role->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn action-btn edit-btn">
                                        <i class="material-symbols-outlined material-icon">edit_square</i>
                                    </a>
                                    <a href="#" class="btn action-btn delete-btn" onclick="
                                        document.getElementById('delete-role-form').action = '{{ route('roles.destroy', $role->id) }}';
                                        document.getElementById('delete-role-form').submit();
                                    ">
                                        <i class="material-symbols-outlined material-icon">delete</i>
                                        <form method="post" id="delete-role-form">
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
                <p class="text-center">No Roles Found</p>
            @endif
        </div>
        <div class="card-footer">
            {{ $roles->withQueryString()->links() }}
        </div>
    </div>
@endsection
