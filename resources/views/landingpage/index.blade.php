@extends('templates.main')

@section('form')
<div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container">
      <a class="navbar-brand" href="/">APP Rekam Medis</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <div class="form-inline my-2 my-lg-0">
          @if (Auth::user())
            <a class="navlink text-light mr-3" href="/">Halo, {{ Auth::user()->username }}!</a>
            <form action="/logout" method="post">
              @csrf
              <button type="submit" onclick="return confirm('Kamu yakin mau tinggalin aku?')" class="btn btn-outline-info bg-info my-2 my-sm-0">
                Keluar 
                <i class="bi bi-box-arrow-left ml-2"></i>
              </button>
            </form>
          @else              
            <a href="/login" class="btn btn-outline-info bg-info my-2 my-sm-0">
              <i class="bi bi-box-arrow-in-right mr-2"></i>
               Masuk 
            </a>
          @endif
        </div>
      </div>
    </div>
  </nav>
</div>
<div>
  @include('landingpage.content')
</div>

@endsection