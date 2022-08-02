<table>
    <tr>
        <th colspan="14">
            RSAU Dr. M. Salamun
        </th>
    </tr>
    <tr>
        <th colspan="14">
            Jl. Ciumbuleuit No.203, Ciumbuleuit, Kec. Cidadap, Kota Bandung, Jawa Barat 40142, Indonesia
        </th>
    </tr>
    <tr>
        <th colspan="14">
            {{ $title }}
        </th>
    </tr>
    <tr>
        <th colspan="14">
            Tanggal : {{ date('j F Y', strtotime($tanggal)) }}
        </th>
    </tr>
</table>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">No RM</th>
            {{-- <th scope="col">Tanggal Tindakan</th> --}}
            <th scope="col">Poli Yang Dituju</th>
            <th scope="col">Pelayanan</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">NIK</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Nomor HP</th>
            <th scope="col">Kategori Pasien</th>
            <th scope="col">Dokter yang Menangani</th>
            <th scope="col">Diagnosa</th>
            <th scope="col">Terapi / Tindakan yang Diberikan</th>
            <th scope="col">Catatan Pasien</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datarm as $rm)                    
        <tr>
            <th>{{ $loop->iteration }}</th>
            <th>{{ $rm->no_rm }}</th>
            {{-- <th>{{ date('j F Y', strtotime($rm->kunjungan->tanggal_kunjungan)) }}</th> --}}
            <th>{{ $rm->kunjungan->poli->name }}</th>
            <th>{{ $rm->kunjungan->pelayanan->name }}</th>
            <th>{{ $rm->kunjungan->pasien->name }}</th>
            <th>{{ "'".$rm->kunjungan->pasien->nik }}</th>
            <th>{{ date('j F Y', strtotime($rm->kunjungan->pasien->tgl_lahir)) }}</th>
            <th>{{ $rm->kunjungan->pasien->gender->name }}</th>
            <th>{{ $rm->kunjungan->pasien->alamat }}</th>
            <th>{{ $rm->kunjungan->pasien->no_hp }}</th>
            <th>{{ $rm->kunjungan->pasien->kategori->name }}</th>
            <th>{{ $rm->dokter->name }}</th>
            <th>{{ $rm->diagnosa }}</th>
            <th>{{ $rm->terapi }}</th>
            <th>{{ $rm->deskripsi }}</th>
        </tr>
        @endforeach
    </tbody>
</table>

<table>
    <tr>
        <th colspan="14">
            Bandung, {{ date('j F Y') }}
        </th>
    </tr>
    <tr>
        <th colspan="14">
            Bagian Rekam Medis,
        </th>
    </tr>
    <tr>
        <th colspan="14">
            
        </th>
    </tr>
    <tr>
        <th colspan="14">
            
        </th>
    </tr>
    <tr>
        <th colspan="14">
            {{ Auth::user()->name }}
        </th>
    </tr>
</table>
