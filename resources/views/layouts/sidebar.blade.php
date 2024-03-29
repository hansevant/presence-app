<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-file"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Presensi-Apk</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('presence') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @if(session('role') === 'Staff' || session('role') === 'Admin')
    <!-- Heading -->
    <div class="sidebar-heading">
       Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Asisten</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('class') }}">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Kelas</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('materials') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Materi</span>
        </a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    @endif
    <!-- Heading -->
    @if(session('role') === 'Staff' || session('role') === 'Admin' || session('role') === 'PJ')
    <div class="sidebar-heading">
        Kode
    </div>
    
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('code') }}">
            <i class="fas fa-fw fa-key"></i>
            <span>Kode Absen</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    @endif

    <div class="sidebar-heading">
        Riwayat Absen
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('history') }}">
            <i class="fas fa-fw fa-clock"></i>
            <span>Riwayat</span>
        </a>
    </li>

    @if(session('role') === 'Staff' || session('role') === 'Admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('report') }}">
            <i class="fas fa-fw fa-tasks"></i>
            <span>Report</span>
        </a>
    </li>
    @endif

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="">
            @csrf
            @method('DELETE') 
            <button class="btn btn-link nav-link" type="submit">
                <i class="fas fa-sign-out-alt fa-sm fa-fw"></i> Logout
            </button>
        </form>
    </li>
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    {{-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}

</ul>