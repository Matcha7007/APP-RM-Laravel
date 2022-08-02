@extends('layout.content')
@section('user', 'active')
@section('show-master', 'menu-open')
@section('active-master', 'active')

@section('main')
<div class="container-fluid">
    <div class="table-responsive col-lg-8">
        <a href="/master/user/create" class="btn btn-primary float-right mb-3">
            <i class="nav-icon fas fa-plus"></i>
             Tambah User
        </a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)                    
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <th>{{ $user->username }}</th>
                    <th>{{ $user->email }}</th>
                    <th>{{ $user->role->name }}</th>
                    <th>
                        <a href="/master/user/{{ $user->username }}/edit" class="badge bg-warning mr-1">
                            <i class="nav-icon fas fa-pencil-alt"></i>
                        </a>
                        <form action="/master/user/{{ $user->username }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Mau dihapus nih datanya?')">
                                <i class="nav-icon fas fa-times"></i>
                            </button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
