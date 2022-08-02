@extends('layout.content')
@section('pasien', 'active')
@section('show-input', 'menu-open')
@section('active-input', 'active')

@section('main')
<div class="container-fluid">
    <div class="table-responsive col-lg-8">
        <div class="d-flex flex-col justify-content-end mb-3">
        </div>
        <div class="row justify-content-end mb-4">
            <a href="/loket-pendaftaran" class="btn btn-secondary mr-3">
                <i class="nav-icon fas fa-notes-medical"></i>
                 Pendaftaran Kunjungan
            </a>
            <a href="/laporan/pasien/unduh" class="btn btn-success mr-3">
                <i class="nav-icon fas fa-download"></i>
                Unduh Data
            </a>
            <a href="/input/pasien/create" class="btn btn-primary">
                <i class="nav-icon fas fa-plus"></i>
                 Tambah Data
            </a>
        </div>
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasiens as $pasien)                    
                <tr>
                    <th>{{ ($pasiens->currentPage() - 1) * $pasiens->perPage() + $loop->iteration }}</th>
                    <th>{{ $pasien->name }}</th>
                    <th>{{ $pasien->tgl_lahir }}</th>
                    <th>{{ $pasien->kategori->name }}</th>
                    <th>{{ $pasien->no_hp }}</th>
                    <th>
                        {{-- <a href="/input/dokter/{{ $dokter->slug }}" class="badge bg-info mr-1">
                            <i class="nav-icon fas fa-eye"></i>
                        </a> --}}
                        <a href="/input/pasien/{{ $pasien->slug }}/edit" class="badge bg-warning mr-1">
                            <i class="nav-icon fas fa-pencil-alt"></i>
                        </a>
                        <form action="/input/pasien/{{ $pasien->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Mau dihapus nih datanya?')">
                                <i class="nav-icon fas fa-times"></i>
                            </button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $pasiens->links() }}
        </div>
    </div>
</div>
@endsection
