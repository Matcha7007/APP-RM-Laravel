@extends('layout.content')
@section('user', 'active')
@section('show-master', 'menu-open')
@section('active-master', 'active')

@section('main')
<div class="container-fluid">
    <form class="col-lg-6" method="post" action="/master/user">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Nama</label>
            <input  type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="name" 
                    name="name"
                     autofocus
                    value="{{ old('name') }}">
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input  type="text" 
                    class="form-control @error('username') is-invalid @enderror" 
                    id="username" 
                    name="username" 
                    value="{{ old('username') }}">
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input  type="text" 
                    class="form-control @error('email') is-invalid @enderror" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}">
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input  type="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    id="password" 
                    name="password" 
                    value="{{ old('password') }}">
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-label" for="role_id">Role User</label>
            <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="role_id">
              <option value=""></option>
              @foreach ($roles as $role)
                @if (old('role_id') == $role->id)  
                  <option value="{{ $role->id }}" selected>{{ $role->name }}</option>  
                @else
                  <option value="{{ $role->id }}">{{ $role->name }}</option>  
                @endif
              @endforeach
            </select>
            @error('role_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <!-- /.card-body -->
    
        <div class="card-footer d-flex justify-content-end">
          <a href="/master/user" class="btn btn-secondary mr-3">Kembali</a>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>

<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function(){
        fetch('/input/createSlug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
@endsection
