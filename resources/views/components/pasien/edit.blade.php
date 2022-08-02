@extends('layout.content')
@section('pasien', 'active')
@section('show-input', 'menu-open')
@section('active-input', 'active')

@section('main')
<div class="container-fluid">

    <form class="col-lg-6" method="post" action="/input/pasien/{{ $pasien->slug }}">
        @method('put')
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input  type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="name" 
                    name="name"
                     autofocus
                    value="{{ old('name', $pasien->name) }}">
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="slug">Alias</label>
            <input  type="text" 
                    class="form-control @error('slug') is-invalid @enderror" 
                    id="slug" 
                    name="slug" 
                    
                    value="{{ old('slug', $pasien->slug) }}">
            @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input  type="text" 
                        name="tgl_lahir"
                        class="form-control datetimepicker-input @error('tgl_lahir') is-invalid @enderror" 
                        data-target="#reservationdate"
                         value="{{ old('tgl_lahir', date('d/m/Y', strtotime($pasien->tgl_lahir))) }}">
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                @error('jam_start')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label class="form-label" for="gender_id">Jenis Kelamin</label>
              <select class="form-control @error('gender_id') is-invalid @enderror" name="gender_id" id="gender_id">
                @foreach ($genders as $gender)
                  @if (old('gender_id', $pasien->gender_id) == $gender->id)  
                    <option value="{{ $gender->id }}" selected>{{ $gender->name }}</option>  
                  @else
                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>  
                  @endif
                @endforeach
              </select>
              @error('gender_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-6">
              <label class="form-label" for="kategori_id">Poli / Pelayanan</label>
              <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id">
                @foreach ($kategories as $kategori)
                  @if (old('kategori_id', $pasien->kategori_id) == $kategori->id)   
                    <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>  
                  @else
                    <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>  
                  @endif
                @endforeach
              </select>
              @error('kategori_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label for="nik">NIK</label>
              <input  type="text" 
                      class="form-control @error('nik') is-invalid @enderror" 
                      id="nik" 
                      name="nik" 
                      
                      value="{{ old('nik', $pasien->nik) }}">
              @error('nik')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group col-6">
              <label class="form-label" for="no_hp">No Hp</label>
              <input  type="text" 
                      class="form-control @error('no_hp') is-invalid @enderror" 
                      id="no_hp" 
                      name="no_hp"
                       value="{{ old('no_hp', $pasien->no_hp) }}">
              @error('no_hp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input  type="text" 
                    class="form-control @error('alamat') is-invalid @enderror" 
                    id="alamat" 
                    name="alamat" 
                    
                    value="{{ old('alamat', $pasien->alamat) }}"
                    rows="3">
            @error('alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="deskripsi">Keterangan</label>
            <textarea  type="text" 
                    class="form-control @error('deskripsi') is-invalid @enderror" 
                    id="deskripsi" 
                    name="deskripsi" 
                    value="{{ old('deskripsi', $pasien->deskripsi) }}"
                    rows="3"></textarea>
            @error('deskripsi')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer d-flex justify-content-end">
          <a href="/input/pasien" class="btn btn-secondary mr-3">Kembali</a>
          <button type="submit" class="btn btn-primary">Ubah</button>
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
