<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('show.dashboard') }}"
                        class="nav-link {{ Request::is('dashboard-control*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('help') }}"
                        class="nav-link {{ Request::is('manajemen-bantuan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hands-helping"></i>
                        <p>
                            Bantuan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('log_activity') }}"
                        class="nav-link {{ Request::is('log-aktivitas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Log Aktivitas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('carousel') }}" class="nav-link {{ Request::is('carousel*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chalkboard"></i>
                        <p>
                            Carousel
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('popup') }}" class="nav-link {{ Request::is('popup*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-flag"></i>
                        <p>
                            Popup
                        </p>
                    </a>
                </li>
                <li class="nav-header">Master Data</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('master-data/user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Pengguna
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('data-user', 'admin') }}"
                                class="nav-link {{ Request::is('master-data/user/admin*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-user', 'pustakawan') }}"
                                class="nav-link {{ Request::is('master-data/user/pustakawan*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pustakawan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-user', 'peminjam') }}"
                                class="nav-link {{ Request::is('master-data/user/peminjam*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Peminjam</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ Request::is('master-data/rak-buku*', 'master-data/kategori*', 'master-data/penempatan-buku*', 'master-data/buku*', 'master-data/e-book*', 'master-data/denda*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Buku
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('data-buku', 'fisik') }}"
                                class="nav-link {{ Request::is('master-data/buku/fisik*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-denda') }}"
                                class="nav-link {{ Request::is('master-data/denda*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Denda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-buku', 'elektronik') }}"
                                class="nav-link {{ Request::is('master-data/buku/elektronik*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E-book</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-kategori') }}"
                                class="nav-link {{ Request::is('master-data/kategori*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-penempatan') }}"
                                class="nav-link {{ Request::is('master-data/penempatan-buku*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penempatan buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-rak') }}"
                                class="nav-link {{ Request::is('master-data/rak-buku*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rak buku</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ Request::is('master-data/perpinjaman*', 'master-data/pengembalian*', 'master-data/terkena-denda*', 'master-data/kunjungan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-day"></i>
                        <p>
                            Data Peminjaman
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('data_perpinjaman') }}"
                                class="nav-link {{ Request::is('master-data/perpinjaman*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perpinjaman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data_pengembali') }}"
                                class="nav-link {{ Request::is('master-data/pengembalian*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengembalian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data_terkena_denda') }}"
                                class="nav-link {{ Request::is('master-data/terkena-denda*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Terkena denda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data_kunjungan') }}"
                                class="nav-link {{ Request::is('master-data/kunjungan*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kunjungan</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ Request::is('master-data/perpustakaan*', 'master-data/aplikasi*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hotel"></i>
                        <p>
                            Data Perpustakaan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('data-aplikasi') }}"
                                class="nav-link {{ Request::is('master-data/aplikasi*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Aplikasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-perpustakaan') }}"
                                class="nav-link {{ Request::is('master-data/perpustakaan*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perpustakaan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Informasi</li>
                <li class="nav-item">
                    <a href="{{ route('buat_notifikasi') }}"
                        class="nav-link {{ Request::is('informasi/buat-notifikasi*', 'informasi/detail-notifikasi*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            Notifikasi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kirim_email') }}"
                        class="nav-link {{ Request::is('informasi/kirim-email*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Kirim Email
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('informasi/buat-artikel*', 'informasi/artikel-saya*', 'informasi/edit-artikel*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-paste"></i>
                        <p>
                            Artikel
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('buat_artikel') }}"
                                class="nav-link {{ Request::is('informasi/buat-artikel*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Buat Artikel
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('artikel_saya') }}"
                                class="nav-link {{ Request::is('informasi/artikel-saya*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Artikel Saya</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('atur_kalender') }}"
                        class="nav-link {{ Request::is('informasi/atur-kalender*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Kalender
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
