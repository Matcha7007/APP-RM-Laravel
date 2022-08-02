@extends('layout.content')
@section('pasien', 'active')
@section('show-input', 'menu-open')
@section('active-input', 'active')

@section('main')
<div class="container-fluid">

    <form class="col-lg-6" method="post" action="/analis/rekam-medis">
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="form-group col-6">
              <label class="form-label" for="kunjungan_id">Nama Pasien</label>
              <select class="form-control select2 @error('kunjungan_id') is-invalid @enderror" name="kunjungan_id" id="kunjungan_id">
                <option value=""></option>
                @foreach ($kunjungans as $kunjungan)
                  @if (old('kunjungan_id') == $kunjungan->id)  
                    <option value="{{ $kunjungan->id }}" selected>{{ $kunjungan->pasien->name }}</option>  
                  @else
                    <option value="{{ $kunjungan->id }}">{{ $kunjungan->pasien->name }}</option>  
                  @endif
                @endforeach
              </select>
              @error('kunjungan_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-6">
              <label class="form-label" for="dokter_id">Dokter</label>
              <select class="form-control select2 @error('dokter_id') is-invalid @enderror" name="dokter_id" id="dokter_id">
                <option value=""></option>                    
                @foreach ($dokters as $dokter)
                  @if (old('dokter_id') == $dokter->id)   
                    <option value="{{ $dokter->id }}" selected>{{ $dokter->name }}</option>  
                  @else
                    <option value="{{ $dokter->id }}">{{ $dokter->name }}</option>  
                  @endif
                @endforeach
              </select>
              @error('dokter_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="diagnosa">Diagnosa</label>
            <input  type="text" 
                    class="form-control @error('diagnosa') is-invalid @enderror" 
                    id="diagnosa" 
                    name="diagnosa"  
                    value="{{ old('diagnosa') }}">
            @error('diagnosa')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-label" for="terapi">Terapi</label>
            <input  type="text" 
                    class="form-control @error('terapi') is-invalid @enderror" 
                    id="terapi" 
                    name="terapi"
                     value="{{ old('terapi') }}">
            @error('terapi')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="deskripsi">Catatan</label>
            <input  type="text" 
                    class="form-control @error('deskripsi') is-invalid @enderror" 
                    id="deskripsi" 
                    name="deskripsi" 
                    
                    value="{{ old('deskripsi') }}"
                    rows="3">
            @error('deskripsi')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer d-flex justify-content-end">
          <a href="/analis/rekam-medis" class="btn btn-secondary mr-3">Kembali</a>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>

<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function(){
        fetch('/slugPasien?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
@endsection
