<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-header">MENU UTAMA</li>
           @if (Auth::user()->role === 'admin')
           <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('suratmasuk.index') }}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Surat Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('suratkeluar.index') }}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Surat Keluar
              </p>
            </a>
          </li>
      {{-- <li class="nav-item">
        <a href="/cetak-laporan-form" class="nav-link">
          <i class="nav-icon fas fa-print"></i>
          <p>
            Laporan Surat
          </p>
        </a>
      </li> --}}
      <li class="nav-header">UTILITY</li>
      <li class="nav-item">
        <a href="{{ route('user.index') }}" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Manajemen User
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('klasifikasi.index') }}" class="nav-link">
          <i class="nav-icon fas fa-layer-group"></i>
          <p>
            Klasifikasi
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('unitkerja.index') }}" class="nav-link">
          <i class="nav-icon fas fa-layer-group"></i>
          <p>
            Unit Kerja
          </p>
        </a>
      </li>
      @elseif (Auth::user()->role == 'pegawai')
      <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('surat.permintaan')}}" class="nav-link">
          <i class="nav-icon fas fa-paper-plane"></i>
          <p>
            Permintaan Surat
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Buat Surat
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('surat.create') }}" class="nav-link">
                  <i class="nav-icon fas fa-genderless"></i>
                  <p>
                    Undangan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('surat.create') }}" class="nav-link">
                  <i class="nav-icon fas fa-genderless"></i>
                  <p>
                    permohonan
                  </p>
                </a>
              </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{ route('suratmasuk.index') }}" class="nav-link">
          <i class="nav-icon fas fa-envelope"></i>
          <p>
            Surat Masuk
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('suratkeluar.index') }}" class="nav-link">
          <i class="nav-icon fas fa-envelope"></i>
          <p>
            Surat Keluar
          </p>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a href="/cetak-laporan-form" class="nav-link">
          <i class="nav-icon fas fa-list-alt"></i>
          <p>
            Laporan Surat
          </p>
        </a>
      </li> --}}
      @elseif (Auth::user()->role == 'kepala')
      <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('surat.verifikasi') }}" class="nav-link">
          <i class="nav-icon fas fa-paper-plane"></i>
          <p>
            Verifikasi Surat
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('suratmasuk.index') }}" class="nav-link">
          <i class="nav-icon fas fa-envelope"></i>
          <p>
            Surat Masuk
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('suratkeluar.index') }}" class="nav-link">
          <i class="nav-icon fas fa-envelope"></i>
          <p>
            Surat Keluar
          </p>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Data Surat
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

        </ul>
      </li> --}}
      <li class="nav-item">
        <a href="/cetak-laporan-form" class="nav-link">
          <i class="nav-icon fas fa-list-alt"></i>
          <p>
            Laporan Surat Masuk
          </p>
        </a>
      </li>
      @endif
    </ul>
  </nav>
