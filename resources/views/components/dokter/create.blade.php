@extends('layout.content')
@section('dokter', 'active')
@section('show-input', 'menu-open')
@section('active-input', 'active')

@section('main')
<div class="container-fluid">

    <form class="col-lg-6" method="post" action="/input/dokter">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Nama Lengkap</label>
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
            <label for="slug">Alias</label>
            <input  type="text" 
                    class="form-control @error('slug') is-invalid @enderror" 
                    id="slug" 
                    name="slug" 
                    
                    value="{{ old('slug') }}">
            @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-label" for="gender_id">Jenis Kelamin</label>
            <select class="form-control @error('gender_id') is-invalid @enderror" name="gender_id" id="gender_id">
              @foreach ($genders as $gender)
                @if (old('gender_id') == $gender->id)  
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
          <div class="form-group">
            <label class="form-label" for="poli_id">Poli</label>
            <select class="form-control @error('poli_id') is-invalid @enderror" name="poli_id" id="poli_id">
              @foreach ($polies as $poli)
                @if (old('poli_id') == $poli->id)   
                  <option value="{{ $poli->id }}" selected>{{ $poli->name }}</option>  
                @else
                  <option value="{{ $poli->id }}">{{ $poli->name }}</option>  
                @endif
              @endforeach
            </select>
            @error('poli_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-label" for="no_hp">No Hp</label>
            <input  type="text" 
                    class="form-control @error('no_hp') is-invalid @enderror" 
                    id="no_hp" 
                    name="no_hp"
                     value="{{ old('no_hp') }}">
            @error('no_hp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <label>Jam Praktik :</label>
          <div class="row bootstrap-timepicker">
            <div class="form-group col-6">
              <label for="jam_start">Mulai</label>
              <div class="input-group date" id="timepicker" data-target-input="nearest">
                <input  type="text" 
                        name="jam_start" 
                        class="form-control datetimepicker-input @error('jam_start') is-invalid @enderror" 
                        data-target="#timepicker"
                         value="{{ old('jam_start') }}">
                <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                </div>
                @error('jam_start')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="form-group col-6">
              <label for="jam_end">Sampai</label>
              <div class="input-group date" id="timepicker2" data-target-input="nearest">
                <input  type="text" 
                        name="jam_end" 
                        class="form-control datetimepicker-input @error('jam_end') is-invalid @enderror" 
                        data-target="#timepicker2"
                         value="{{ old('jam_end') }}">
                <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                </div>
                @error('jam_end')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
    
        <div class="card-footer d-flex justify-content-end">
          <a href="/input/dokter" class="btn btn-secondary mr-3">Kembali</a>
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
