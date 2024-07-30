@extends('layouts.pustakawan_layout')
@section('content')
    <form id="save-form" action="" method="POST">
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
                <h5>Content artikel</h5>
                <textarea id="editor" name="pesan"></textarea>
                <button type="submit" class="btn btn-primary mt-4">Kirim email</button>
            </div>
        </div>
    </form>

    <script src="/js/dropzone.js"></script>
@endsection
