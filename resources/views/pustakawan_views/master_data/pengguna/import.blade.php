@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-header">
            Upload Excel File
        </div>
        <div class="card-body">
            <form id="uploadForm" method="post">
                @csrf
                <input type="file" id="fileInput" accept=".xlsx, .xls, .csv" />
                <br><br>
                <div id="excelPreview"></div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="">
                    <button type="button" class="btn btn-warning"><i class="fas fa-redo-alt"></i> Refresh</button>
                </a>
            </form>
        </div>
    </div>
@endsection
