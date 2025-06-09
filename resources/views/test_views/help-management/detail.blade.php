<x-test-layout :title="$title" :pageTitle="$pageTitle" :name="$name" :type="$type" :btn-name="$btnName" :url="$url">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="" class="form-label">Nama Pengirim</label>
                        <input type="text" class="form-control" value="{{ $help->user->nama }}" readonly disabled>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="" class="form-label">Kategori</label>
                        <input type="text" class="form-control" value="{{ $help->kategori }}" readonly disabled>
                    </div>
                </div>
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label for="" class="form-label">Subject Laporan</label>
                        <input type="text" class="form-control" value="{{ $help->subject }}" readonly disabled>
                    </div>
                </div>
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label for="" class="form-label">Subject Laporan</label>
                        <textarea type="text" rows="5" class="form-control" readonly disabled>{{ $help->laporan }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-test-layout>