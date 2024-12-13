<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <h3>SISTEM POLIKLINIK</h3>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('home') ? 'active' : '' }}" href="/home" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">UI COMPONENTS</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('pasien*') ? 'active' : 'collapsed' }}" href="#"
                        data-bs-toggle="collapse" data-bs-target="#collapsePasien" aria-expanded="true"
                        aria-controls="collapsePasien" style="display: block ruby;">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Pasien</span>
                        <span class="float-end">
                            <i class="ti ti-chevron-{{ request()->is('pasien*') ? 'up' : 'down' }}" id="chevron-icon-pasien"></i>
                        </span>
                    </a>
                    <div class="{{ request()->is('pasien*') ? 'collapse show' : 'collapse' }}"
                        id="collapsePasien" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sidebarnav">
                            <li class="sidebar-item {{ request()->is('/pasien') ? 'active' : '' }}">
                                <a class="sidebar-link ms-3" href="/pasien" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-circle"></i>
                                    </span>
                                    <span class="hide-menu">Data Pasien</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('/pasien/create') ? 'active' : '' }}">
                                <a class="sidebar-link ms-3" href="/pasien/create" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-circle"></i>
                                    </span>
                                    <span class="hide-menu">Tambah Pasien</span>
                                </a>
                            </li>
                        </nav>
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('poliklinik*') ? 'active' : 'collapsed' }}" href="#"
                        data-bs-toggle="collapse" data-bs-target="#collapsePoliklinik" aria-expanded="true"
                        aria-controls="collapsePoliklinik" style="display: block ruby;">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Poliklinik</span>
                        <span class="float-end">
                            <i class="ti ti-chevron-{{ request()->is('poliklinik*') ? 'up' : 'down' }}" id="chevron-icon-poliklinik"></i>
                        </span>
                    </a>
                    <div class="{{ request()->is('poliklinik*') ? 'collapse show' : 'collapse' }}"
                        id="collapsePoliklinik" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sidebarnav">
                            <li class="sidebar-item {{ request()->is('/poliklinik') ? 'active' : '' }}">
                                <a class="sidebar-link ms-3" href="/poliklinik" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-circle"></i>
                                    </span>
                                    <span class="hide-menu">Data Poliklinik</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('/poliklinik/create') ? 'active' : '' }}">
                                <a class="sidebar-link ms-3" href="/poliklinik/create" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-circle"></i>
                                    </span>
                                    <span class="hide-menu">Tambah Poliklinik</span>
                                </a>
                            </li>
                        </nav>
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('pendaftaran*') ? 'active' : 'collapsed' }}" href="#"
                        data-bs-toggle="collapse" data-bs-target="#collapsePendaftaran" aria-expanded="true"
                        aria-controls="collapsePendaftaran" style="display: block ruby;">
                        <span>
                            <i class="ti ti-user-plus"></i>
                        </span>
                        <span class="hide-menu">Pendaftaran</span>
                        <span class="float-end">
                            <i class="ti ti-chevron-{{ request()->is('pendaftaran*') ? 'up' : 'down' }}" id="chevron-icon-pendaftaran"></i>
                        </span>
                    </a>
                    <div class="{{ request()->is('pendaftaran*') ? 'collapse show' : 'collapse' }}"
                        id="collapsePendaftaran" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sidebarnav">
                            <li class="sidebar-item {{ request()->is('/pendaftaran') ? 'active' : '' }}">
                                <a class="sidebar-link ms-3" href="/pendaftaran" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-circle"></i>
                                    </span>
                                    <span class="hide-menu">Pendaftaran</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('/pendaftaran/create') ? 'active' : '' }}">
                                <a class="sidebar-link ms-3" href="/pendaftaran/create" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-circle"></i>
                                    </span>
                                    <span class="hide-menu">Tambah Pendaftaran</span>
                                </a>
                            </li>
                        </nav>
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('laporan*') ? 'active' : 'collapsed' }}" href="#"
                        data-bs-toggle="collapse" data-bs-target="#collapseLaporan" aria-expanded="true"
                        aria-controls="collapseLaporan" style="display: block ruby;">
                        <span>
                            <i class="ti ti-user-plus"></i>
                        </span>
                        <span class="hide-menu">Laporan</span>
                        <span class="float-end">
                            <i class="ti ti-chevron-{{ request()->is('laporan*') ? 'up' : 'down' }}" id="chevron-icon-laporan"></i>
                        </span>
                    </a>
                    <div class="{{ request()->is('laporan*') ? 'collapse show' : 'collapse' }}"
                        id="collapseLaporan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sidebarnav">
                            <li class="sidebar-item {{ request()->is('/laporan/pasien*') ? 'active' : '' }}">
                                <a class="sidebar-link ms-3" href="/laporan/pasien" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-circle"></i>
                                    </span>
                                    <span class="hide-menu">Laporan Pasien</span>
                                </a>
                            </li>
                            <li class="sidebar-item {{ request()->is('/laporan/pendaftaran*') ? 'active' : '' }}">
                                <a class="sidebar-link ms-3" href="/laporan/pendaftaran" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-circle"></i>
                                    </span>
                                    <span class="hide-menu">Laporan Pendaftaran</span>
                                </a>
                            </li>
                        </nav>
                    </div>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">AUTH</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-login"></i>
                        </span>
                        <span class="hide-menu">Login</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-plus"></i>
                        </span>
                        <span class="hide-menu">Register</span>
                    </a>
                </li>



            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
