<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    @if (Auth::user()->level == 'admin')
        
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3"></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/admin">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/view_user">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>User</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/view_pembayaran">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Pembayaran</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/view_tagihan">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tagihan</span></a>
        </li>
        
    @else

<!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/petugas">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3"></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/petugas">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/petugas/view_tagihan">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tagihan</span></a>
        </li>
    @endif
</ul>