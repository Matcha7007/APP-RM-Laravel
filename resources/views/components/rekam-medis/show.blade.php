@extends('layout.content')
@section('show-analis', 'active')
@section('show-analis-menu', 'active')

@section('main')
<div class="container-fluid">
  @include('components.rekam-medis.template-single')
  <div class="row mt-4">
    <a href="/analis/rekam-medis" class="btn btn-secondary mr-3 ml-4">
       Kembali
    </a>
    <a href="/unduh/single-rm/{{ $datarm->no_rm }}" target="blank" class="btn btn-success">
      <i class="nav-icon fas fa-print"></i>
       Cetak
    </a>
  </div>
</div>
@endsection
