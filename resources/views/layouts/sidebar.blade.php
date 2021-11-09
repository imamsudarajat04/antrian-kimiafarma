<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('dashboard')">
        <a class="nav-link" href="{{ route('dashboardadmin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        BAGIAN PENTING
    </div>

    @if(auth()->user()->level == "admin")
        <!-- Nav Item - Semua Data -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                {{-- <i class="fas fa-fw fa-cog"></i> --}}
                <i class="fas fa-fw fa-folder"></i>
                <span>DATA</span>
            </a>
            <div id="collapseTwo" class="collapse @yield('main')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Pasien:</h6>
                    <a class="collapse-item @yield('pasien')" href="{{ route('pasien.index') }}">Pasien</a>
                    <h6 class="collapse-header">Data Obat:</h6>
                    <a class="collapse-item @yield('obat')" href="{{ route('obat.index') }}">Obat</a>
                    <h6 class="collapse-header">Data Permohonan:</h6>
                    <a class="collapse-item @yield('permohonan')" href="{{ route('permohonan.index') }}">Permohonan</a>
                    <h6 class="collapse-header">Data Dokter:</h6>
                    <a class="collapse-item @yield('dokter')" href="{{ route('dokter.index') }}">Dokter</a>
                    <h6 class="collapse-header">Data Users:</h6>
                    <a class="collapse-item @yield('users')" href="{{ route('user.index') }}">Users</a>
                </div>
            </div>
        </li>
    

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Tambahan
        </div>

        <!-- Nav Item - Antrian -->
        <li class="nav-item @yield('antrian')">
            <a class="nav-link" href="{{ route('antrian.index') }}">
                <i class="fas fa-angle-double-right"></i>
                <span>Antrian</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    @endif

</ul>
<!-- End of Sidebar -->