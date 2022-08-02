<main role="main">
    <div class="container marketing">
        <h2 class="text-center text-info mt-3 mb-3">Selamat Datang di Applikasi Rumah Sakit</h2>
        <hr class="featurette-divider">
    
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">RSAU Dr. <span class="text-muted">M Salamun</span></h2>
                <p class="lead">Rumah Sakit TNI AU Dr. M. Salamun Dinas Kesehatan TNI Angkatan Udara adalah Rumah Sakit Militer tingkat II yang berada di Kabupaten Bandung, Jawa Barat. RSAU Dr. M. Salamun mempunyai visi Menyelenggarakan dukungan kesehatan yang diperlukan dalam setiap operasi dan latihan TNI/TNI AU, Menyelenggarakan pelayanan kesehatan yang bermutu terhadap anggota TNI/TNI AU berikut keluarganya serta masyarakat umum dan Meningkatkan kemampuan profesionalisme personel secara berkesinambungan. Rumah Sakit TNI AU Dr. Salamun Bandung, berada di Jl. Ciumbuleuit No.203, Cidadap, Bandung (40142), Indonesia</p>
                {{-- <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quam nam assumenda, quibusdam accusantium suscipit voluptatum porro minima dolorum, vero aut expedita non incidunt perferendis necessitatibus at atque modi nemo ducimus doloremque doloribus delectus voluptatem, unde recusandae! Ab mollitia sunt amet alias aliquam ipsa, quaerat necessitatibus culpa tempore doloribus aspernatur numquam id? Sit magnam, atque veniam itaque dolorem odio dolore excepturi ducimus vero nobis cum omnis nihil perferendis cumque sapiente adipisci animi id. Quaerat, quis.</p> --}}
            </div>
            <div class="col-md-5">
                <img src="../img/logo1.jpg" alt="">
                {{-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em"></text></svg> --}}
            </div>
        </div>
    
        <hr class="featurette-divider">
        <h2 class="featurette-heading mb-3">Info Ketersediaan <span class="text-muted">Poli</span></h2>
            @include('landingpage.info')

        <hr class="featurette-divider">
        <h2 class="featurette-heading mb-3">Info Antrian <span class="text-muted">Pasien</span></h2>
        <div class="card bg-gradient-info">
            <div class="card-header border-0">
              <h3 class="card-title">
                <i class="fas fa-book mr-1"></i>
                Antrian Pasien
              </h3>
              <!-- card tools -->
              <div class="card-tools">
                <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            @if ($kunjungans->count())
            <div class="card-body">
              @include('components.kunjungan.data')
            </div>
            @else
            <div class="card-body">
              Belum Ada Antrian Pasien!
            </div>
            @endif
            <!-- /.card-body-->
        </div>

        <hr class="featurette-divider">
        @if (!Auth::user())            
        <p>Silahkan login untuk bisa melanjutkan pendaftaran pasien <a href="/login">di sini</a>.</p>
        <hr class="featurette-divider">
        @endif
    </div><!-- /.container -->

    <footer class="container sticky-bottom">
    <p class="float-right">
        <button class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Kembali ke atas" onclick="return window.scrollTo(0, 0);">
            <i class="bi bi-arrow-up-square"></i>
        </button>
        {{-- <a class="btn btn-outline-info" href="/" data-toggle="tooltip" data-placement="top" title="Kembali ke atas">
            <i class="bi bi-arrow-up-square"></i>
        </a> --}}
    </p>
    <p>&copy; 2022 App Rekam Medis &middot; <a href="">Privacy</a> &middot; <a href="">Terms</a></p>
    </footer>
</main>

<script>
    function scrollToTop() {
        window.scrollTo(0, 0);
    }
</script>