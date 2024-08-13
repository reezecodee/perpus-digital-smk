@extends('layouts.pustakawan_layout')
@section('content')
    <div class="card">
        <div class="card-header">
            Upload Excel File
        </div>
        <div class="card-body">
            <form id="uploadForm" method="POST">
                @csrf
                <div class="form-group">
                    <input type="file" id="fileUpload" class="form-control-file" />
                </div>
            </form>
            <h5>Data Preview:</h5>
            <table class="table table-bordered mb-3" id="excelTable">
                <thead>
                    <tr id="tableHeader"></tr>
                </thead>
                <tbody id="tableBody"></tbody>
            </table>
            <button class="btn btn-primary" id="submitData">Submit Data</button>
        </div>
    </div>
@endsection
