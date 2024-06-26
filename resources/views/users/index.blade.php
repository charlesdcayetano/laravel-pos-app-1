@extends('layouts.app')

@section('content-header', 'USER MANAGEMENT')
@section('content')
    <div class="card border-0">
        <div class="card-header">
            <div class="table-actions">
                <div class="row m-0">
                    <a href="{{ route('users.create') }}" class="btn action-btn add-btn col-auto">Add User</a>
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
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if ($user->is_deleted == 0)
                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ !empty($user->middle_name) ? $user->middle_name : 'N/A' }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->gender_name }}</td>
                                <td>{{ $user->role_name }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn action-btn edit-btn">
                                        <i class="material-symbols-outlined material-icon">edit_square</i>
                                    </a>
                                    <a href="#" class="btn action-btn delete-btn" id="delete-user"
                                        onclick="
                                        document.getElementById('delete-user-form').action = '{{ route('users.destroy', $user->id) }}'; 
                                        document.getElementById('delete-user-form').submit();
                                        ">
                                        <i class="material-symbols-outlined material-icon">delete</i>
                                        <form method="post" id="delete-user-form">
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
            {{ $users->withQueryString()->links() }}
        </div>
    </div>
@endsection
