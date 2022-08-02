@extends('templates.main')

@section('form')
<body class="hold-transition login-page">
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="{{ asset('/login') }}" class="h1"><b>RSAU </b>DR.M.Salamun</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Aplikasi Rekam Medis</p>
    
          <form action="/login" method="post">
            @csrf
            <div class="input-group mb-3">
              <input  name="email" 
                        id="email"
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        placeholder="Email"
                        value="{{ old('email') }}" 
                        required
                        autofocus>
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
              <input  type="password" 
                      id="password"
                      name="password"
                      class="form-control" 
                      placeholder="Password"
                      required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-4">
                <p class="mb-0">
                  <a href="/register" class="text-center text-indigo">Daftar Baru</a>
                </p>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <a href="/" class="btn btn-secondary btn-block">
                   Kembali 
                </a>
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-info btn-block">Masuk</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->
    
    <!-- jQuery -->
    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/') }}dist/js/adminlte.min.js"></script>
</body>
@endsection