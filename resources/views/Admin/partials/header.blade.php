<header class="app-header fixed-top">
    <div class="app-header-inner">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                            <i class="fas fa-bars" style="font-size: 30px;"></i>
                        </a>
                    </div><!--//col-->
                    <div class="search-mobile-trigger d-sm-none col">
                        <i class="search-mobile-trigger-icon fa-solid fa-magnifying-glass"></i>
                    </div><!--//col-->
                    <div class="app-search-box col">
                        <form class="app-search-form">
                            <input type="text" placeholder="Search projects..." name="search" class="form-control search-input">
                            <button type="submit" class="btn search-btn btn-primary" value="Search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div><!--//app-search-box-->

                    <div class="app-utilities col-auto">
                        <div class="app-utility-item app-notifications-dropdown dropdown">
                            <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" title="Notifications">
                                <i class="fas fa-bell"></i>
                                <span class="icon-badge">3</span>
                            </a><!--//dropdown-toggle-->

                            <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
                                <div class="dropdown-menu-header p-3">
                                    <h5 class="dropdown-menu-title mb-0">Notifications</h5>
                                </div><!--//dropdown-menu-title-->
                                <div class="dropdown-menu-content">
                                    <div class="item p-3">
                                        <div class="row gx-2 justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="app-icon-holder">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </div>
                                            </div><!--//col-->
                                            <div class="col">
                                                <div class="info">
                                                    <div class="desc">Material Delay Alert</div>
                                                    <div class="meta">2 hours ago</div>
                                                </div>
                                            </div><!--//col-->
                                        </div><!--//row-->
                                    </div><!--//item-->
                                    <div class="item p-3">
                                        <div class="row gx-2 justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="app-icon-holder">
                                                    <i class="fas fa-tools"></i>
                                                </div>
                                            </div><!--//col-->
                                            <div class="col">
                                                <div class="info">
                                                    <div class="desc">Equipment Maintenance Due</div>
                                                    <div class="meta">1 day ago</div>
                                                </div>
                                            </div><!--//col-->
                                        </div><!--//row-->
                                    </div><!--//item-->
                                    <div class="item p-3">
                                        <div class="row gx-2 justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="app-icon-holder icon-holder-mono">
                                                    <i class="fas fa-calendar-check"></i>
                                                </div>
                                            </div><!--//col-->
                                            <div class="col">
                                                <div class="info">
                                                    <div class="desc">Milestone Completed</div>
                                                    <div class="meta">3 days ago</div>
                                                </div>
                                            </div><!--//col-->
                                        </div><!--//row-->
                                    </div><!--//item-->
                                </div><!--//dropdown-menu-content-->
                            </div><!--//dropdown-menu-->
                        </div><!--//app-utility-item-->
                        <div class="app-utility-item">
                            <a href="" title="Settings">
                                <i class="fas fa-gear"></i>
                            </a>
                        </div><!--//app-utility-item-->
                    </div><!--//app-utilities-->
                </div><!--//row-->
            </div><!--//app-header-content-->
        </div><!--//container-fluid-->
    </div><!--//app-header-inner-->
    <div id="app-sidepanel" class="app-sidepanel">
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
        <div class="sidepanel-inner d-flex flex-column">
            <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <span class="nav-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </span>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.contractor') ? 'active' : '' }}" href="{{ route('admin.contractor') }}">
                            <span class="nav-icon">
                                <i class="fas fa-helmet-safety"></i>
                            </span>
                            <span class="nav-link-text">Contractors</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.projects') ? 'active' : '' }}" href="{{ route('admin.projects') }}">
                            <span class="nav-icon">
                                <i class="fas fa-building"></i>
                            </span>
                            <span class="nav-link-text">Projects</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.resources') ? 'active' : '' }}" href="{{ route('admin.resources') }}">
                            <span class="nav-icon">
                                <i class="fas fa-tools"></i>
                            </span>
                            <span class="nav-link-text">Resources</span>
                        </a>
                    </li>
                    <li class="nav-item has-submenu">
                        <a class="nav-link submenu-toggle {{ request()->routeIs(['admin.attendence', 'admin.payroll', 'admin.assignment']) ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
                            <span class="nav-icon">
                                <i class="fas fa-users"></i>
                            </span>
                            <span class="nav-link-text">Workforce</span>
                            <span class="submenu-arrow">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </a>
                        <div id="submenu-1" class="collapse submenu submenu-1 {{ request()->routeIs(['admin.attendence', 'admin.payroll', 'admin.assignment']) ? 'show' : '' }}" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item">
                                    <a class="submenu-link {{ request()->routeIs('admin.attendence') ? 'active' : '' }}" href="{{ route('admin.attendence') }}">Attendance</a>
                                </li>
                                <li class="submenu-item">
                                    <a class="submenu-link {{ request()->routeIs('admin.payroll') ? 'active' : '' }}" href="{{ route('admin.payroll') }}">Payroll</a>
                                </li>
                                <li class="submenu-item">
                                    <a class="submenu-link {{ request()->routeIs('admin.assignment') ? 'active' : '' }}" href="{{ route('admin.assignment') }}">Assignments</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item has-submenu">
                        <a class="nav-link submenu-toggle {{ request()->routeIs(['report.budget', 'report.progress', 'report.material']) ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
                            <span class="nav-icon">
                                <i class="fas fa-file-invoice"></i>
                            </span>
                            <span class="nav-link-text">Reports</span>
                            <span class="submenu-arrow">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </a>
                        <div id="submenu-2" class="collapse submenu submenu-2 {{ request()->routeIs(['report.budget', 'report.progress', 'report.material']) ? 'show' : '' }}" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item">
                                    <a class="submenu-link {{ request()->routeIs('report.budget') ? 'active' : '' }}" href="{{ route('report.budget') }}">Budget Reports</a>
                                </li>
                                <li class="submenu-item">
                                    <a class="submenu-link {{ request()->routeIs('report.progress') ? 'active' : '' }}" href="{{ route('report.progress') }}">Progress Reports</a>
                                </li>
                                <li class="submenu-item">
                                    <a class="submenu-link {{ request()->routeIs('report.material') ? 'active' : '' }}" href="{{ route('report.material') }}">Material Usage</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.schedule') ? 'active' : '' }}" href="{{ route('admin.schedule') }}">
                            <span class="nav-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <span class="nav-link-text">Schedule</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.bidding') ? 'active' : '' }}" href="{{ route('admin.bidding') }}">
                            <span class="nav-icon">
                                <i class="fas fa-gavel"></i>
                            </span>
                            <span class="nav-link-text">Bidding</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <span class="nav-icon">
                                <i class="fas fa-question-circle"></i>
                            </span>
                            <span class="nav-link-text">Support</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="app-sidepanel-footer">
                <nav class="app-nav app-nav-footer">
                    <ul class="app-menu footer-menu list-unstyled">
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <span class="nav-icon">
                                    <i class="fas fa-gear"></i>
                                </span>
                                <span class="nav-link-text">Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <span class="nav-icon">
                                    <i class="fas fa-download"></i>
                                </span>
                                <span class="nav-link-text">Export Data</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <span class="nav-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <span class="nav-link-text">Profile</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
