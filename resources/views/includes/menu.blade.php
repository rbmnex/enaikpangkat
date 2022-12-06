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

            {{-- <li class=" nav-item">
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
            </li> --}}
            @role(['secretariat'])
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">Pemangkuan</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/urussetia/kumpulan/') }}">
                            <i data-feather='users'></i>
                            <span class="menu-item text-truncate" data-i18n="Pengurusan Pengguna">Senarai <br/> Kumpulan</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/urussetia/appl/main/') }}">
                            <i data-feather="inbox"></i>
                            <span class="menu-item text-truncate" data-i18n="Pengurusan Pengguna">senarai <br/> Permohonan</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a class="d-flex align-items-center" href="/urussetia/resume/lampiran/">
                            <i data-feather='link-2'></i>
                                <span class="menu-item text-truncate" data-i18n="Pengurusan Pengguna">Lampiran</span>
                            </a>
                    </li> --}}

                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">Resume</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/urussetia/resume/') }}">
                            <i data-feather='file-text'></i>
                                <span class="menu-item text-truncate" data-i18n="Pengurusan Pengguna">Senarai <br/> Resume</span>
                            </a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">Tetapan</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/bpsm/question/') }}">
                            <i data-feather='link-2'></i>
                            <span class="menu-item text-truncate" data-i18n="Pengurusan Pengguna">LNPK <br/> Bank Soalan</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endrole
            @role(['coordinator'])
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">Surat Pink</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/hr2/pinkform/') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Surat Pink">Senarai <br/> Surat Pink</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endrole
            @role('superadmin')
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">
                        Pengguna
                    </span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/admin/pengguna/') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Pengurusan Pengguna">Senarai <br/> Pengguna</span>
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
            @endrole
            @role(['user'])
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">Pemangkuan</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/user/form/') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Surat Pink">Senarai Permohonan</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/pemangku/tawaran/') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Surat Pink">Tawaran</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">Naik Pangkat</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/naikpangkat/ukp13/') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Surat Pink">UKP 13</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">Resume</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/user/resume/lampiran') }}">
                            <i data-feather='file-text'></i>
                                <span class="menu-item text-truncate" data-i18n="Pengurusan Pengguna">Borang <br/> Lampiran</span>
                            </a>
                    </li>
                </ul>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/user/resume/download') }}">
                            <i data-feather='file-text'></i>
                                <span class="menu-item text-truncate" data-i18n="Pengurusan Pengguna">Muat Turun</span>
                            </a>
                    </li>
                </ul>
            </li>
            @endrole
            @role(['clerk'])
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">Pengesahan</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/validate/senarai/hos') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Surat Pink">Pengesahan <br/>Borang</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="/kb/pengesahan-pink/">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Surat Pink">Pengesahan <br/> Lapor Diri Pegawai</span>
                        </a>
                    </li>
                </ul>
            </li>

            @endrole
            @role(['hod'])
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">Pengesahan</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/validate/senarai/hod') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Surat Pink">Pengesahan <br/>Borang</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/kj/pengesahan-pink/') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Surat Pink">Pengesahan <br/> Lapor Diri Pegawai</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endrole
            @role(['supervisor'])
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">LPNK</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="{{ url('/penyelia/lpnk/') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Surat Pink">Senarai <br/>Borang LPNK</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endrole
        </ul>
        @endif
    </div>
</div>
