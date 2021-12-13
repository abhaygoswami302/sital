
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.index') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_student.create') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Add New Student</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_student.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>View All Students</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_fee.create') }}">
                    <i class="fas fa-fw fa-money-bill-wave"></i>
                    <span>Add Fee Details</span></a>
            </li>
            <!--li class="nav-item">
                <a class="nav-link" href="{{ route('status.index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Update Status</span></a>
            </li-->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <!--div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div-->

        </ul>
        <!-- End of Sidebar -->