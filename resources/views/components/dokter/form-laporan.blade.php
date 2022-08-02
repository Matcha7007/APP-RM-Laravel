@extends('layout.content')
@section('dokter', 'active')
@section('show-report', 'menu-open')
@section('active-report', 'active')

@section('main')
<div class="container-fluid">
    <div class="table-responsive">
        <div class="row mb-3">
            <div class="col">
            </div>
            <div class="col d-flex flex-row justify-content-end row">
                {{-- <form action="/laporan/dokter/filter" method="post" class="d-flex flex-row col justify-content-end">
                    @csrf
                    <select class="form-control col-6" name="filter" id="filter">
                        <option value="1">Semua</option>  
                        <option value="2">Poli / pelayanan</option>  
                        <option value="3">Jenis Kelamin</option>  
                    </select>
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-filter"></i>
                        Filter
                    </button>
                </form> --}}
                {{-- <button class="btn btn-success col-2 mr-1" id="unduhData" name="unduhData">
                    <i class="fa fa-download"></i>
                    Unduh
                </button> --}}
                {{-- <button class="btn btn-primary col-2">
                    <i class="fa fa-print"></i>
                    Cetak
                </button> --}}
                <a href="/laporan/dokter/unduh" class="btn btn-primary col-2">
                    <i class="nav-icon fa fa-download"></i>
                      Unduh
                </a>
            </div>
        </div>
        <table class="table table-striped table-hover text-center" id="tablePrint" name="tablePrint">
            <thead>
                <tr>
                    <th scope="col" rowspan="2" class="align-middle">No</th>
                    <th scope="col" rowspan="2" class="align-middle">Nama</th>
                    <th scope="col" rowspan="2" class="align-middle">Jenis Kelamin</th>
                    <th scope="col" rowspan="2" class="align-middle">No Hp</th>
                    <th scope="col" rowspan="2" class="align-middle">Poli / Pelayanan</th>
                    <th scope="col" colspan="2">Jam Praktik</th>
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
                    <th>{{ $dokter->gender->name }}</th>
                    <th>{{ $dokter->no_hp }}</th>
                    <th>{{ $dokter->poli->name }}</th>
                    <th>{{ date('H:i', strtotime($dokter->jam_start)) }}</th>
                    <th>{{ date('H:i', strtotime($dokter->jam_end)) }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $dokters->links() }}
        </div>
    </div>
</div>

<script>
    function downloadPDFWithjsPDF() {
    var doc = new jspdf.jsPDF('p', 'pt', 'a4');

    doc.html(document.querySelector('#tablePrint'), {
        callback: function (doc) {
        doc.save('MLB World Series Winners.pdf');
        },
        margin: [60, 60, 60, 60],
        x: 32,
        y: 32,
    });
    }

    document.querySelector('#unduhData').addEventListener('click', downloadPDFWithjsPDF);
</script>
@endsection
