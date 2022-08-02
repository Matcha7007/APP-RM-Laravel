@extends('layout.content')
@section('pasien', 'active')
@section('show-report', 'menu-open')
@section('active-report', 'active')

@section('main')
<div class="container-fluid">
    <div class="table-responsive">
        <div class="row mb-3">
            <div class="col">
            </div>
            <div class="col d-flex flex-row justify-content-end row">
                <a href="/laporan/pasien/unduh" class="btn btn-primary col-2">
                    <i class="nav-icon fa fa-download"></i>
                      Unduh
                </a>
            </div>
        </div>
        <table class="table table-striped table-hover text-center" id="tablePrint" name="tablePrint">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasiens as $pasien)                    
                <tr>
                    <th>{{ ($pasiens->currentPage() - 1) * $pasiens->perPage() + $loop->iteration }}</th>
                    <th>{{ $pasien->name }}</th>
                    <th>{{ $pasien->nik }}</th>
                    <th>{{ $pasien->tgl_lahir }}</th>
                    <th>{{ $pasien->kategori->name }}</th>
                    <th>{{ $pasien->no_hp }}</th>
                    <th>{{ $pasien->alamat }}</th>
                    <th>{{ $pasien->deskripsi }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $pasiens->links() }}
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
