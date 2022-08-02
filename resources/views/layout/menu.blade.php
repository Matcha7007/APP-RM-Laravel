<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="{{ url('/dashboard') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
            {{-- <i class="right fas fa-angle-left"></i> --}}
          </p>
        </a>
      </li>
      @can('administrator')
      <li class="nav-item">
        <a href="" class="nav-link @yield('active-master')">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Master
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/master/user" class="nav-link @yield('user')">
              <i class="far fa-circle nav-icon"></i>
              <p>User</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="" class="nav-link @yield('active-input')">
          <i class="nav-icon fas fa-folder-open"></i>
          <p>
            Data
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/input/pasien" class="nav-link @yield('pasien')">
              <i class="far fa-circle nav-icon"></i>
              <p>Data Pasien</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="/input/dokter" class="nav-link @yield('dokter')">
              <i class="far fa-circle nav-icon"></i>
              <p>Data Dokter</p>
            </a>
          </li>
        </ul>
      </li>     
      @endcan
      @can('admin')          
      <li class="nav-item">
        <a href="" class="nav-link @yield('show-analis-menu')">
          <i class="nav-icon fas fa-chart-area"></i>
          <p>
            Analis
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/analis/rekam-medis" class="nav-link @yield('show-analis')">
              <i class="far fa-circle nav-icon"></i>
              <p>Analis Rekam Medis</p>
            </a>
            <a href="/laporan/rekam-medis" class="nav-link @yield('show-laporan')">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan Rekam Medis</p>
            </a>
          </li>
        </ul>
      </li>
      @endcan
      <hr>
      <li class="nav-item"></li>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      </div>
      <li class="nav-item mt-5">
        <form action="/logout" method="post">
          @csrf
          <button type="submit" onclick="return confirm('Kamu yakin mau tinggalin aku?')" class="nav-link">
            <i class=" nav-icon fas fa-sign-out-alt"></i>
            <p>
              Keluar
            </p>
          </button>
        </form>
      </li>
    </ul>
</nav>
