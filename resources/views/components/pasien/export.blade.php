{{-- @extends('templates.main')

@section('form') --}}
<table>
    <tr>
        <th colspan="7">
            RSAU Dr. M. Salamun
        </th>
    </tr>
    <tr>
        <th colspan="7">
            Jl. Ciumbuleuit No.203, Ciumbuleuit, Kec. Cidadap, Kota Bandung, Jawa Barat 40142, Indonesia
        </th>
    </tr>
    <tr>
        <th colspan="7">
            {{ $title }}
        </th>
    </tr>
</table>
<table class="table table-bordered text-center">
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
            <th>{{ $loop->iteration }}</th>
            <th>{{ $pasien->name }}</th>
            <th>{{ "'".$pasien->nik }}</th>
            <th>{{ $pasien->tgl_lahir }}</th>
            <th>{{ $pasien->kategori->name }}</th>
            <th>{{ $pasien->no_hp }}</th>
            <th>{{ $pasien->alamat }}</th>
            <th>{{ $pasien->deskripsi }}</th>
        </tr>
        @endforeach
    </tbody>
</table>
<table>
    <tr>
        <th colspan="7">
            Bandung, {{ date('d F Y', strtotime(now())) }}
        </th>
    </tr>
</table>
