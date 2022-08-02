{{-- @extends('templates.main')

@section('form') --}}
<div class="container-fluid">
    <div class="d-flex flex-col row mb-4">
        {{-- <div class="col-4">
            <img src="/img/logo1.png" style="width: 150px;">
        </div> --}}
        {{-- <div class="col-8 text-center">
            <h3>
                RSAU Dr. M. Salamun
            </h3>
            <h4>
                Jl. Ciumbuleuit No.203, Ciumbuleuit, Kec. Cidadap, Kota Bandung, Jawa Barat 40142, Indonesia
            </h4>
            <h3>
                {{ $title }}
            </h3>
        </div> --}}
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
    </div>
    <div class="table-responsive">
        <table class="table table-bordered text-center">
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
    </div>
    <div class="d-flex flex-col row mt-4">
        <div class="col-8">
        </div>
        <div class="col-4 text-right">
            <h6>
                Bandung, {{ date('d F Y', strtotime(now())) }}
            </h6>
        </div>
    </div>
</div>
{{-- @endsection --}}
