@extends('layouts.pustakawan_layout')
@section('content')
    <form id="save-form" action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <h5>Cover artikel</h5>
                <div id="dropzone" class="dropzone">
                    <img src="https://www.svgrepo.com/show/458232/img-box.svg" width="50" alt="" srcset="">
                    <p>Seret dan jatuhkan gambar di sini atau klik untuk memilih gambar</p>
                    <input type="file" id="fileInput" style="display: none;">
                </div>
                <div class="d-flex justify-content-center">
                    <div id="previewContainer" class="preview-container"></div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5>Metadata</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" placeholder="Judul artikel" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Author</label>
                            <input type="text" name="author" placeholder="Author artikel" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Keyword</label>
                            <input type="text" name="keyword" placeholder="Kata kunci" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="deskripsi" class="form-control" cols="30" rows="3" placeholder="Deskripsi artikel" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5>Content artikel</h5>
                <textarea id="editor" name="pesan"></textarea>
                <button type="submit" class="btn btn-primary mt-4">Publikasikan</button>
            </div>
        </div>
    </form>

    <script src="/js/dropzone.js"></script>
@endsection
