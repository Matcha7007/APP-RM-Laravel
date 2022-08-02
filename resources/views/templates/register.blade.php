@extends('templates.main')

@section('form')
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <a href="/login" class="h1"><b>RSAU </b>DR.M.Salamun</a>
          </div>
          <div class="card-body">
            <p class="login-box-msg">Halaman Daftar Baru</p>
      
            <form action="/register" method="post">
              @csrf
              <div class="input-group mb-3">
                <input  name="name" 
                        id="name"
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        placeholder="Full name"
                        value="{{ old('name') }}" 
                        required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
                @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="input-group mb-3">
                <input  name="username" 
                        id="username"
                        type="text" 
                        class="form-control @error('username') is-invalid @enderror" 
                        placeholder="Username"
                        value="{{ old('username') }}" 
                        required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="input-group mb-3">
                <input  name="email" 
                        id="email"
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        placeholder="Email"
                        value="{{ old('email') }}" 
                        required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
                @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="input-group mb-3">
                <input  name="password" 
                        id="password"
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        placeholder="Password"
                        required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="row">
                <!-- /.col -->
                <div class="col-4">
                  <a href="/login" class="mt-8  text-indigo">Sudah punya akun?</a>
                </div>
                <div class="col-4">
                  <a href="/" class="btn btn-secondary btn-block">
                     Kembali 
                  </a>
                </div>
                <div class="col-4">
                  <button type="submit" class="btn btn-info btn-block">Daftar</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
      

          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- jQuery -->
    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/') }}dist/js/adminlte.min.js"></script>
</body>
@endsection