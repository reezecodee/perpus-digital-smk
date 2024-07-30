@extends('layouts.pustakawan_layout')
@section('content')
    <div class="alert alert-primary" role="alert">
        Gunakan fitur ini hanya dalam keadaan penting saja. Email yang Anda kirim tidak dapat dikembalikan, jadi berhati-hatilah.
    </div>
    <div class="card">
        <div class="card-body">
            <form id="save-form" action="" method="POST">
                @csrf
                <div class="d-flex justify-content-end align-items-center mb-4">
                    <span class="mr-2">Penerima:</span>
                    <select name="penerima" class="form-control select2 w-25" required>
                        <option selected>--Pilih penerima--</option>
                        <option value="Ambatukam">Ambatukam</option>
                        <option value="John Doe">John Doe</option>
                        <option value="Jane Doe">Jane Doe</option>
                    </select>
                </div>
                <textarea id="editor" name="pesan"></textarea>
                <button type="submit" class="btn btn-primary mt-4">Kirim email</button>
            </form>
        </div>
    </div>
@endsection
