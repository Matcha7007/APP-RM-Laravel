@extends('layout.content')
@section('dokter', 'active')
@section('show-input', 'menu-open')
@section('active-input', 'active')

@section('main')
<div class="container-fluid">
    <div class="table-responsive col-lg-8">
        <div class="row justify-content-end mb-4">
            <a href="/laporan/dokter/unduh" class="btn btn-success mr-3">
                <i class="nav-icon fas fa-download"></i>
                 Unduh Data
            </a>
            <a href="/input/dokter/create" class="btn btn-primary">
                <i class="nav-icon fas fa-plus"></i>
                 Tambah Data
            </a>
        </div>
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th scope="col" rowspan="2" class="align-middle">No</th>
                    <th scope="col" rowspan="2" class="align-middle">Nama</th>
                    <th scope="col" rowspan="2" class="align-middle">Poli</th>
                    <th scope="col" colspan="2">Jam Praktik</th>
                    <th scope="col" rowspan="2" class="align-middle">Action</th>
                </tr>
                <tr>
                    <th scope="col">Dari</th>
                    <th scope="col">Sampai</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($dokters as $dokter)                    
                <tr>
                    <th>{{ ($dokters->currentPage() - 1) * $dokters->perPage() + $loop->iteration }}</th>
                    <th>{{ $dokter->name }}</th>
                    <th>{{ $dokter->poli->name }}</th>
                    <th>{{ date('H:i', strtotime($dokter->jam_start)) }}</th>
                    <th>{{ date('H:i', strtotime($dokter->jam_end)) }}</th>
                    <th>
                        {{-- <a href="/input/dokter/{{ $dokter->slug }}" class="badge bg-info mr-1">
                            <i class="nav-icon fas fa-eye"></i>
                        </a> --}}
                        <a href="/input/dokter/{{ $dokter->slug }}/edit" class="badge bg-warning mr-1">
                            <i class="nav-icon fas fa-pencil-alt"></i>
                        </a>
                        <form action="/input/dokter/{{ $dokter->slug }}" method="post" class="d-inline">
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
            {{ $dokters->links() }}
        </div>
    </div>
</div>
@endsection
