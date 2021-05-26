<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Buat Surat
              </p>
            </a>
          </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Data Surat
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('suratmasuk.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-genderless"></i>
                  <p>
                    Surat Masuk
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('suratkeluar.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-genderless"></i>
                  <p>
                    Surat Keluar
                  </p>
                </a>
              </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{ route('jenissurat.index') }}" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Jenis Surat
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Disposisi
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-list-alt"></i>
          <p>
            Laporan Surat
          </p>
        </a>
      </li>
      <li class="nav-header">MISCELLANEOUS</li>
      <li class="nav-item">
        <a href="https://adminlte.io/docs/3.1/" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>Documentation</p>
        </a>
      </li>
    </ul>
  </nav>
