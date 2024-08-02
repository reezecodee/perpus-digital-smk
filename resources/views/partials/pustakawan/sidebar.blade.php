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
                    <a href="{{ route('pustakawan.dashboard') }}"
                        class="nav-link {{ Request::is(route('pustakawan.dashboard')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('chat_masuk') }}"
                        class="nav-link {{ Request::is('chat-masuk') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Chat Masuk
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-header">Master Data</li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ Request::is('master-data/admin*', 'master-data/pustakawan*', 'master-data/peminjam*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Pengguna
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('data-admin.index') }}"
                                class="nav-link {{ Request::is('master-data/admin*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-pustakawan.index') }}"
                                class="nav-link {{ Request::is('master-data/pustakawan*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pustakawan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-peminjam.index') }}"
                                class="nav-link {{ Request::is('master-data/peminjam*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Peminjam</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ Request::is('master-data/rak-buku*', 'master-data/kategori*', 'master-data/buku*', 'master-data/e-book*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Buku
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('data-buku.shelf') }}"
                                class="nav-link {{ Request::is('master-data/rak-buku*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rak buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-buku.category') }}"
                                class="nav-link {{ Request::is('master-data/kategori*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-buku.book') }}"
                                class="nav-link {{ Request::is('master-data/buku*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-buku.ebook') }}"
                                class="nav-link {{ Request::is('master-data/e-book*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E-book</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('master-data/perpinjaman*', 'master-data/pengembalian*', 'master-data/kunjungan*', 'master-data/denda*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-day"></i>
                        <p>
                            Data Peminjaman
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('data-peminjam.index') }}"
                                class="nav-link {{ Request::is('master-data/perpinjaman*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perminjaman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-pengembali.index') }}"
                                class="nav-link {{ Request::is('master-data/pengembalian*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengembalian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-kunjungan.index') }}"
                                class="nav-link {{ Request::is('master-data/kunjungan*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kunjungan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-denda.index') }}"
                                class="nav-link {{ Request::is('master-data/denda*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Denda</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('master-data/perpustakaan*', 'master-data/aplikasi*',) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hotel"></i>
                        <p>
                            Data Perpustakaan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('data-perpustakaan.index') }}"
                                class="nav-link {{ Request::is('master-data/perpustakaan*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perpustakaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-aplikasi.index') }}"
                                class="nav-link {{ Request::is('master-data/aplikasi*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Aplikasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Informasi</li>
                <li class="nav-item">
                    <a href="{{ route('buat_notifikasi') }}"
                        class="nav-link {{ Request::is('informasi/buat-notifikasi*') ? 'active' : '' }}">
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
                    <a href="{{ route('buat_artikel') }}"
                        class="nav-link {{ Request::is('informasi/buat-artikel*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-paste"></i>
                        <p>
                            Buat Artikel
                        </p>
                    </a>
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
                <li class="nav-header">Generate</li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Laporan Peminjaman
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Laporan Buku
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
