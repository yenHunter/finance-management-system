<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin-home') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{'admin-contact'}}" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <div class="dropdown-item">
                    <div class="media">
                        <img src="admin/dist/img/user1-128x128.jpg" alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm"><a href="#" data-toggle="tooltip"
                                        data-placement="bottom" title="Marks as read"><i
                                            class="fas fa-envelope-open text-danger"></i></a>
                                </span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="dropdown-item">
                    <div class="media">
                        <img src="admin/dist/img/user1-128x128.jpg" alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm"><a href="#" data-toggle="tooltip"
                                        data-placement="bottom" title="Marks as read"><i
                                            class="fas fa-envelope-open text-danger"></i></a>
                                </span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="dropdown-item">
                    <div class="media">
                        <img src="admin/dist/img/user1-128x128.jpg" alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm"><a href="#" data-toggle="tooltip"
                                        data-placement="bottom" title="Marks as read"><i
                                            class="fas fa-envelope-open text-danger"></i></a>
                                </span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img class="rounded" src="{{ asset(Session::get('user')['user_picture']) }}" height="25px"
                    alt="User Logo">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset(Session::get('user')['user_picture']) }}" alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{ Session::get('user')['name'] }}
                            </h3>
                            <p class="text-sm">{{ Session::get('user')['email'] }}</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <div class="dropdown-item">
                    <a class="btn btn-info btn-block" href="#">
                        <i class="fas fa-user-circle"></i>
                        Profile
                    </a>
                </div>
                <div class="dropdown-divider"></div>
                <div class="dropdown-item">
                    <a class="btn btn-danger btn-block" href="{{ route('admin-logout') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </div>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin-home')}}" class="brand-link">
        <img src="{{ asset('admin/dist/img/kgf.jpg') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">KGF Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-3 mb-3">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin-home') }}"
                        class="nav-link @if (Session::get('active') == 'dashboard') {{ 'active' }} @endif">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item @if (Session::get('open') == 'home') {{ 'menu-open' }} @endif">
                    <a href="#" class="nav-link @if (Session::get('open') == 'home') {{ 'active' }} @endif">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Home page
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin-home-message') }}"
                                class="nav-link @if (Session::get('active') == 'message') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Message from ED</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-home-slider') }}"
                                class="nav-link @if (Session::get('active') == 'slider') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-home-notice') }}"
                                class="nav-link @if (Session::get('active') == 'notice') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Notice Board</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-home-partner') }}"
                                class="nav-link @if (Session::get('active') == 'partner') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Partners</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin-about') }}" class="nav-link @if (Session::get('active') == 'about') {{ 'active' }} @endif">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            About
                        </p>
                    </a>
                </li>
                <li class="nav-item @if (Session::get('open') == 'report') {{ 'menu-open' }} @endif">
                    <a href="#" class="nav-link @if (Session::get('open') == 'report') {{ 'active' }} @endif">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Report & Work Plan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin-report-annual-work-plan') }}"
                                class="nav-link @if (Session::get('active') == 'annual_work_plan') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Annual Work Plan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-report-strategic-implementation-plan') }}"
                                class="nav-link @if (Session::get('active') == 'strategic_implementation_plan') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Strategic & Implem. Plan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-report-project-completion-report') }}"
                                class="nav-link @if (Session::get('active') == 'project_completion_report') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>PCR</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-report-annual-report') }}"
                                class="nav-link @if (Session::get('active') == 'annual_report') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Annual Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-report-monitoring-review-report') }}"
                                class="nav-link @if (Session::get('active') == 'monitoring_review_report') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Monitoring & Rev. Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-report-other-report') }}"
                                class="nav-link @if (Session::get('active') == 'other_report') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Other Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (Session::get('open') == 'project') {{ 'menu-open' }} @endif">
                    <a href="#"
                        class="nav-link @if (Session::get('open') == 'project') {{ 'active' }} @endif">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Project
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin-project-list') }}"
                                class="nav-link @if (Session::get('active') == 'project_list') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-project-create') }}"
                                class="nav-link @if (Session::get('active') == 'project_create') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-project-category') }}"
                                class="nav-link @if (Session::get('active') == 'project_category') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-project-call') }}"
                                class="nav-link @if (Session::get('active') == 'project_call') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Call</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin-gallery')}}" class="nav-link @if (Session::get('active') == 'gallery') {{ 'active' }} @endif">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin-contact') }}" class="nav-link @if (Session::get('active') == 'contact') {{ 'active' }} @endif">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Contact</p>
                    </a>
                </li>
                <li class="nav-item @if (Session::get('open') == 'internal_link') {{ 'menu-open' }} @endif">
                    <a href="#"
                        class="nav-link @if (Session::get('open') == 'internal_link') {{ 'active' }} @endif">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Internal Links
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin-technical-bulletin') }}"
                                class="nav-link @if (Session::get('active') == 'technical_bulletin') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Technical Bulletin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-projukti-barta') }}"
                                class="nav-link @if (Session::get('active') == 'projukti_barta') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Projukti Barta</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-achievement') }}"
                                class="nav-link @if (Session::get('active') == 'achievement') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Achievement & Highlight</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-newsletter') }}"
                                class="nav-link @if (Session::get('active') == 'newsletter') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Newsletter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-publication') }}"
                                class="nav-link @if (Session::get('active') == 'publication') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Publications</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-archive') }}"
                                class="nav-link @if (Session::get('active') == 'archive') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Archive</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (Session::get('open') == 'download') {{ 'menu-open' }} @endif">
                    <a href="#"
                        class="nav-link @if (Session::get('open') == 'download') {{ 'active' }} @endif">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Downloads
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin-operational-manual') }}"
                                class="nav-link @if (Session::get('active') == 'operational_manual') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Operational Manual</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-prescribed-format') }}"
                                class="nav-link @if (Session::get('active') == 'prescribed_format') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Prescribed Format</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (Session::get('open') == 'settings') {{ 'menu-open' }} @endif">
                    <a href="#"
                        class="nav-link @if (Session::get('open') == 'settings') {{ 'active' }} @endif">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin-settings-general-body') }}"
                                class="nav-link @if (Session::get('active') == 'general-body') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>General Body</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-settings-board-directors') }}"
                                class="nav-link @if (Session::get('active') == 'board-directors') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Board Directors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-settings-employee') }}"
                                class="nav-link @if (Session::get('active') == 'employee') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Employee</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-settings-researcher') }}"
                                class="nav-link @if (Session::get('active') == 'researcher') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Researcher</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-settings-organization') }}"
                                class="nav-link @if (Session::get('active') == 'organization') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Organization</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-settings-location') }}"
                                class="nav-link @if (Session::get('active') == 'location') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Location</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin-settings-category') }}"
                                class="nav-link @if (Session::get('active') == 'category') {{ 'active' }} @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Website</li>
                <li class="nav-item">
                    <a href="{{ route('/') }}" target="_blank" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Webiste
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
