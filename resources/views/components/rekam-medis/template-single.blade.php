<div class="">
    <div class="row">
      <div class="col-3">Nomor Rekam Medis</div>
      <div>:</div>
      <div class="col">{{ $datarm->no_rm }}</div>
    </div>
    <div class="row">
      <div class="col-3">Tanggal Kunjungan</div>
      <div>:</div>
      <div class="col">{{ $datarm->kunjungan->tanggal_kunjungan }}</div>
    </div>
    <div class="row">
      <div class="col-3">Poli yang Dituju</div>
      <div>:</div>
      <div class="col">{{ $datarm->kunjungan->poli->name }}</div>
    </div>
    <div class="row">
      <div class="col-3">Pelayanan</div>
      <div>:</div>
      <div class="col">{{ $datarm->kunjungan->pelayanan->name }}</div>
    </div>
    <hr>
    {{-- Data Pasien --}}
    <div class="row">
      <div class="col-3">Nama Pasien</div>
      <div>:</div>
      <div class="col">{{ $datarm->kunjungan->pasien->name }}</div>
    </div>
    <div class="row">
      <div class="col-3">NIK</div>
      <div>:</div>
      <div class="col">{{ $datarm->kunjungan->pasien->nik }}</div>
    </div>
    <div class="row">
      <div class="col-3">Tanggal Lahir</div>
      <div>:</div>
      <div class="col">{{ $datarm->kunjungan->pasien->tgl_lahir }}</div>
    </div>
    <div class="row">
      <div class="col-3">Jenis Kelamin</div>
      <div>:</div>
      <div class="col">{{ $datarm->kunjungan->pasien->gender->name }}</div>
    </div>
    <div class="row">
      <div class="col-3">Alamat</div>
      <div>:</div>
      <div class="col">{{ $datarm->kunjungan->pasien->alamat }}</div>
    </div>
    <div class="row">
      <div class="col-3">Nomor HP</div>
      <div>:</div>
      <div class="col">{{ $datarm->kunjungan->pasien->no_hp }}</div>
    </div>
    <div class="row">
      <div class="col-3">Kategori Pasien</div>
      <div>:</div>
      <div class="col">{{ $datarm->kunjungan->pasien->kategori->name }}</div>
    </div>
    <hr>
    {{-- data rekam medis --}}
    <div class="row">
      <div class="col-3">Dokter yang Menangani Pasien</div>
      <div>:</div>
      <div class="col">{{ $datarm->dokter->name }}</div>
    </div>
    <div class="row">
      <div class="col-3">Diagnosa</div>
      <div>:</div>
      <div class="col">{{ $datarm->diagnosa }}</div>
    </div>
    <div class="row">
      <div class="col-3">Terapi / Tindakan yang Diberikan</div>
      <div>:</div>
      <div class="col">{{ $datarm->terapi }}</div>
    </div>
    <div class="row">
      <div class="col-3">Catatan Pasien</div>
      <div>:</div>
      <div class="col">{{ $datarm->deskripsi }}</div>
    </div>

  </div>