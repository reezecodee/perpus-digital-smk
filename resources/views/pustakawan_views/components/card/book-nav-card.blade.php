<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <form class="d-inline" action="{{ route('print_pdf_books', $format) }}" method="post">
                    @csrf
                    <button class="btn btn-primary" type="submit"><i class="fas fa-print"></i></button>
                </form>
                <form class="d-inline" action="{{ route('export_books', $format) }}" method="post">
                    @csrf
                    <button class="btn btn-success" type="submit"><i class="fas fa-file-excel"></i></button>
                </form>
            </div>
            <div>
                <div class="btn-group">
                    @if ($format != 'elektronik')
                        <button type="button" class="btn btn-success"><i class="fas fa-upload"></i> Import via
                            Excel</button>
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" data-toggle="modal" data-target="#modal-default"
                                href="javascript:void(0)">Import langsung</a>
                            <a class="dropdown-item" href="javascript:void(0)">Download format</a>
                        </div>
                    @endif
                </div>
                <a href="{{ route('add_book', $format) }}">
                    <button class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Buku
                        {{ ucfirst($format) }}</button>
                </a>
            </div>
        </div>
    </div>
</div>