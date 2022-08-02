{{-- @extends('layout.content') --}}
{{-- @section('dokter', 'active')
@section('show-input', 'menu-open')
@section('active-input', 'active') --}}
{{-- @section('pendaftaran', 'ya')

@section('main') --}}
<div class="container-fluid">

    <form class="col-lg-12" method="post" action="/loket-pendaftaran">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label class="form-label" for="pasien_id">Nama Pasien</label>
            <select class="form-control select2 @error('pasien_id') is-invalid @enderror" name="pasien_id" id="pasien_id">
              <option value=""></option>
              @foreach ($pasiens as $pasien)
                @if (old('pasien_id') == $pasien->id)  
                  <option value="{{ $pasien->id }}" selected>{{ $pasien->name }}</option>  
                @else
                  <option value="{{ $pasien->id }}">{{ $pasien->name }}</option>  
                @endif
              @endforeach
            </select>
            @error('pasien_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror 
          </div>
          <div class="form-group">
            <label class="form-label" for="poli_id">Tujuan Poli</label>
            <select class="form-control @error('poli_id') is-invalid @enderror" name="poli_id" id="poli_id">
              @if (Auth::user()->role_id === 3)
                @foreach ($polies as $poli)
                  @if (old('poli_id') == $poli->id)  
                    <option value="{{ $poli->id }}" selected>{{ $poli->name }}</option>  
                  @else
                    <option value="{{ $poli->id }}">{{ $poli->name }}</option>  
                  @endif
                @endforeach
              @else    
                <option value=""></option>  
                @foreach ($polies as $poli)
                  @if (old('poli_id') == $poli->id)  
                    <option value="{{ $poli->id }}" selected>{{ $poli->name }}</option>  
                  @else
                    <option value="{{ $poli->id }}">{{ $poli->name }}</option>  
                  @endif
                @endforeach
              @endif
            </select>
            @error('poli_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-label" for="poli_id">Pelayanan</label>
            <select class="form-control @error('pelayanan_id') is-invalid @enderror" name="pelayanan_id" id="pelayanan_id">
              <option value=""></option>  
              @foreach ($pelayanans as $pelayanan)
                @if (old('pelayanan_id') == $pelayanan->id)  
                  <option value="{{ $pelayanan->id }}" selected>{{ $pelayanan->name }}</option>  
                @else
                  <option value="{{ $pelayanan->id }}">{{ $pelayanan->name }}</option>  
                @endif
              @endforeach
            </select>
            @error('pelayanan_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <!-- /.card-body -->
    
        <div class="card-footer d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Daftar</button>
        </div>
    </form>
    <div class="col-lg-12 text-right mt-3 pr-4">
      Pasien belum ada? <a href="{{ Auth::user()->role_id === 1 ? '/input/pasien/create' : '/tambah-pasien' }}">Tambah Pasien</a> dulu di sini!
    </div>
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
{{-- @endsection --}}
