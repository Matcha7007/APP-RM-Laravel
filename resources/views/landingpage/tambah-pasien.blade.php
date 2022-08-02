@extends('templates.main')

@section('form')
<body class="hold-transition login-page">
    <div class="col-lg-6">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="/" class="h1"><b>RSAU </b>DR.M.Salamun</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Form Pasien Baru</p>
    
          @include('components.pasien.template-form')
    
          
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
    <script>
      const name = document.querySelector('#name');
      const slug = document.querySelector('#slug');
  
      name.addEventListener('change', function(){
          fetch('/slugPasien?name=' + name.value)
              .then(response => response.json())
              .then(data => slug.value = data.slug)
      });
  </script>
</body>
@endsection