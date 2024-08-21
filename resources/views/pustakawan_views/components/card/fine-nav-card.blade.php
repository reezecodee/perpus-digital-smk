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
                <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary"><i
                        class="fas fa-plus"></i> Tambah denda</button>
            </div>
        </div>
    </div>
</div>