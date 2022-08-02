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
            <th scope="col" rowspan="2" class="align-middle">No</th>
            <th scope="col" rowspan="2" class="align-middle">Nama</th>
            <th scope="col" rowspan="2" class="align-middle">Jenis Kelamin</th>
            <th scope="col" rowspan="2" class="align-middle">No Hp</th>
            <th scope="col" rowspan="2" class="align-middle">Poli</th>
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
            <th>{{ $loop->iteration }}</th>
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
<table>
    <tr>
        <th colspan="7">
            Bandung, {{ date('d F Y', strtotime(now())) }}
        </th>
    </tr>
</table>
