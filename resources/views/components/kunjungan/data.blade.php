<table class="table table-hover text-center">
    <thead>
        <tr>
            <th scope="col" rowspan="2" class="align-middle">No</th>
            <th scope="col" rowspan="2" class="align-middle">Nama</th>
            <th scope="col" rowspan="2" class="align-middle">Poli</th>
            <th scope="col" rowspan="2" class="align-middle">Pelayanan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kunjungans as $kunjungan)                    
            <tr>
                <th>{{ $loop->iteration }}</th>
                <th>{{ $kunjungan->pasien->name }}</th>
                <th>{{ $kunjungan->poli->name }}</th>
                <th>{{ $kunjungan->pelayanan->name }}</th>
            </tr>
        @endforeach
    </tbody>
</table>