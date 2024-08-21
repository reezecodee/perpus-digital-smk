<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <form class="d-inline" action="" method="post">
                    @csrf
                    <button class="btn btn-primary" type="submit"><i class="fas fa-print"></i></button>
                </form>
                <form class="d-inline" action="" method="post">
                    @csrf
                    <button class="btn btn-success" type="submit"><i class="fas fa-file-excel"></i></button>
                </form>
            </div>
            <div>
                <a href="{{ route('data_perpinjaman') }}" title="Hapus filter">
                    <button class="btn btn-success"><i class="fas fa-eraser"></i></button>
                </a>
                <div class="btn-group">
                    <button type="button" class="btn btn-warning"><i class="fas fa-filter"></i> Filter
                        berdasarkan</button>
                    <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                        @if (Request::is('master-data/perpinjaman*'))
                            <a class="dropdown-item" href="?filter=masa%20pinjam">Masa pinjam</a>
                            <a class="dropdown-item" href="?filter=masa%20pengembalian">Masa pengembalian</a>
                            <a class="dropdown-item" href="?filter=menunggu%20persetujuan">Menunggu persetujuan</a>
                            <a class="dropdown-item" href="?filter=ditolak">Ditolak</a>
                            <a class="dropdown-item" href="?filter=menunggu%20diambil">Menunggu diambil</a>
                        @elseif(Request::is('master-data/pengembalian'))
                            <a class="dropdown-item" href="?filter=sudah%20dikembalikan">Sudah dikembalikan</a>
                            <a class="dropdown-item" href="?filter=sudah%20diulas">Sudah diulas</a>
                        @elseif(Request::is('master-data/terkena-denda*'))
                            <a class="dropdown-item" href="?filter=terkena%20denda">Terkena denda</a>
                            <a class="dropdown-item" href="?filter=sudah%20dibayar">Sudah dibayar</a>
                            <a class="dropdown-item" href="?filter=menunggu%20konfirmasi%20pembayaran">Menunggu konfirmasi pembayaran</a>
                        @endif
                    </div>
                </div>
                <a href="{{ route('add_peminjaman') }}">
                    <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah peminjam</button>
                </a>
            </div>
        </div>
    </div>
</div>