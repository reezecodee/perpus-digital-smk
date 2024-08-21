<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="">Upload PDF E-book</label>
            <div class="d-flex justify-content-center mb-3">
                <img src="https://www.svgrepo.com/show/518507/pdf-doc-scan.svg" alt="" class="w-25 border"
                    srcset="">
            </div>
            <p id="fileNamePDF" class="text-center"></p>
            <input type="file" name="e_book_file" id="fileInputPDF" accept=".pdf" style="display: none">
            <div class="d-flex justify-content-center w-full">
                <button type="button" id="uploadPDFBtn" class="btn btn-success mr-2"><i class="fas fa-upload"></i>
                    Upload PDF</button>
                @if (isset($e_book_file))
                    <a href="{{ route('read_e_book', $id) }}">
                        <button type="button" class="btn btn-warning"><i class="fas fa-book"></i>
                            Lihat E-book</button>
                    </a>
                @endif
            </div>
            @error('e_book_file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <p id="errorMessagePDF"></p>
        </div>
    </div>
</div>
