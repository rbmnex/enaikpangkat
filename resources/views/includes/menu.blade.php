  <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/rtl/vertical-menu-template-bordered/index.html"><span class="brand-logo">
                <img src="{{ asset('images/jkr_logo.png') }}" height="30px" width="200px"/>
                        </span>
                    <h2 class="brand-text">JKR</h2>
                </a></li>
            {{-- <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li> --}}
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        @if(!empty(Auth::user()))
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Menu - Menu</span><i data-feather="more-horizontal"></i>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">Menu Besar</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Menu Kedua">Menu Kedua</span>
                        </a>
                        <ul class="menu-content">
                            <li>
                                <a class="d-flex align-items-center" href="#" target="_blank">
                                    <span class="menu-item text-truncate" data-i18n="menu kecil">Menu Kecil</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">BPSM</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="/urussetia/kumpulan/">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Pengurusan Pengguna">Pengurusan <br/> Kumpulan</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="/urussetia/resume/">
                            <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Pengurusan Pengguna">Mockup Resume</span>
                            </a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">BPSK</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="/hr/pinkform/">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Surat Pink">Surat Pink</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">Admin</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="/admin/pengguna/">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Pengurusan Pengguna">Pengurusan <br/> Pengguna</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a class="d-flex align-items-center" href="/admin/pengguna/mockup1">
                            <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Pengurusan Pengguna">Mockup Perakuan Pegawai</span>
                            </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="/admin/pengguna/mockup2">
                            <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Pengurusan Pengguna">Mockup Tapisan Keutuhan</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="/admin/pengguna/mockup3">
                            <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Pengurusan Pengguna">Mockup Butir-Butir Peribadi</span>
                            </a>
                    </li> --}}
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">Pemangku</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="/pemangku/tawaran/">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Surat Pink">Tawaran</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        @endif
    </div>
</div>
