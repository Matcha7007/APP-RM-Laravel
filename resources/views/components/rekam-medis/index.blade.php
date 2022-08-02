@extends('layout.content')
@section('show-analis', 'active')
@section('show-analis-menu', 'active')

@section('main')
<div class="container-fluid">
    <div class="table-responsive col-lg-12">
        <div class="row justify-content-end">
            <div class="col-md-3">
                <form action="/analis/rekam-medis">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="No Rekam Medis" name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Cari</button>
                        </div>
                    </div>    
                </form>
            </div>
            <a href="/analis/rekam-medis/create" class="btn btn-primary float-right mb-3">
                <i class="nav-icon fas fa-plus"></i>
                 Tambah Data
            </a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No RM</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Tanggal Berobat</th>
                    <th scope="col">Poli Yang Dituju</th>
                    <th scope="col">Dokter</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datarm as $rm)                    
                <tr>
                    <th>{{ ($datarm->currentPage() - 1) * $datarm->perPage() + $loop->iteration }}</th>
                    <th>{{ $rm->no_rm }}</th>
                    <th>{{ $rm->kunjungan->pasien->name }}</th>
                    <th>{{ $rm->kunjungan->tanggal_kunjungan }}</th>
                    <th>{{ $rm->kunjungan->poli->name }}</th>
                    <th>{{ $rm->dokter->name }}</th>
                    <th>
                        <a href="/analis/rekam-medis/{{ $rm->no_rm }}" class="badge bg-info mr-1">
                            <i class="nav-icon fas fa-eye"></i>
                        </a>
                        {{-- <form action="/analis/rekam-medis/{{ $rm->no_rm }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Mau dihapus nih datanya?')">
                                <i class="nav-icon fas fa-times"></i>
                            </button>
                        </form> --}}
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $datarm->links() }}
        </div>
    </div>
</div>
@endsection
