<x-test-layout :title="$title" :pageTitle="$pageTitle" :name="$name">
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Penerima Email</label>
                            <select name="email" class="form-select @error('email') is-invalid @enderror">
                                <option value="">-- Pilih Penerima Email --</option>
                            </select>
                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Subject</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject"
                                placeholder="Masukkan subject">
                            @error('subject')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Pesan</label>
                            <textarea cols="5" rows="5" class="form-control @error('pesan') is-invalid @enderror"
                                name="pesan" placeholder="Masukkan pesan email"></textarea>
                            @error('pesan')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-librarian.input.cnfrm-checkbox />
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Kirim Email</button>
                </div>
            </form>
        </div>
    </div>
</x-test-layout>