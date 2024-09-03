<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Excel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('direct_import_user') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p class="text-center">
                        Pastikan kamu mengupload file dengan format yang sudah ditentukan. Kamu bisa upload file
                        berformat xlsx, xls, dan csv
                    </p>
                    <div class="d-flex justify-content-center w-full mb-3">
                        <img src="https://www.svgrepo.com/show/452084/pdf.svg" width="50" alt=""
                            srcset="" class="d-block">
                    </div>
                    <div class="d-flex justify-content-center">
                        <input type="file" class="d-block" name="data_user" accept=".xlsx, xls, csv" id="">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>