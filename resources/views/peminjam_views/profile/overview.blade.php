@extends('layouts.profile_layout')
@section('content-card')
    <div class="self-start w-full border shadow-md rounded-md p-4">
        <h1 class="text-xl font-bold mb-1">Profile saya</h1>
        <hr class="mb-3">
        @session('success')
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100" role="alert">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
        @endsession
        <p class="font-semibold mb-2">Foto profile</p>
        <div class="flex gap-4 items-center mb-1">
            <img src="{{ asset('storage/img/profile/' . (auth()->user()->photo ?? 'unknown.jpg')) }}" width="90"
                id="preview-profile" class="rounded-full">
            <div>
                <button type="button" data-modal-target="static-modal" data-modal-toggle="static-modal"
                    class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-2 font-bold"><i
                        class="fas fa-upload"></i> Upload
                    foto</button>
            </div>
        </div>
        <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Upload foto
                        </h3>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="flex justify-center">
                            <div class="w-80" align="center">
                                <div id="display_image_div">
                                    <img name="display_image_data" id="display_image_data" src="/img/dummy-image.png"
                                        alt="Picture">
                                </div>
                                <input type="hidden" name="image" id="cropped_image_data">
                                <br>
                                <input type="file" name="image" id="browse_image" accept=".png, .jpg, .jpeg">
                            </div>
                            <div id="cropped_image_result" class="hidden">
                                <img class="crop-result" src="/img/dummy-image.png" />
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button data-modal-hide="static-modal" id="crop_button" type="submit"
                            class="text-white bg-red-primary hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                        <a href="">
                            <button data-modal-hide="static-modal" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-red-200 hover:bg-red-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-red-100">Batalkan</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-sm mb-3">Ukuran foto maksimal sebesar 2MB dan harus berformat jpg, jpeg, atau png.
        </p>
        <form action="{{ route('update_profile', auth()->user()->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <p class="font-semibold mb-1">Username</p>
                    <input type="text"
                        class="p-2 rounded-md border @error('username') border-red-primary @enderror w-full font-medium"
                        value="{{ old('username', auth()->user()->username) }}" name="username" autocomplete="off">
                    @error('username')
                        <span class="text-red-primary font-medium">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <p class="font-semibold mb-1">Nama lengkap</p>
                    <input type="text"
                        class="p-2 rounded-md border @error('nama') border-red-primary @enderror w-full font-medium"
                        value="{{ old('nama', auth()->user()->nama) }}" name="nama" autocomplete="off">
                    @error('nama')
                        <span class="text-red-primary font-medium">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <p class="font-semibold mb-1">NIS</p>
                    <input type="number"
                        class="p-2 rounded-md border @error('nip_nis') border-red-primary @enderror w-full font-medium"
                        value="{{ old('nip_nis', auth()->user()->nip_nis) }}" name="nip_nis" autocomplete="off">
                    @error('nip_nis')
                        <span class="text-red-primary font-medium">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <p class="font-semibold mb-1">NISN</p>
                    <input type="number"
                        class="p-2 rounded-md border @error('nisn') border-red-primary @enderror w-full font-medium"
                        value="{{ old('nisn', auth()->user()->nisn) }}" name="nisn" autocomplete="off">
                    @error('nisn')
                        <span class="text-red-primary font-medium">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <p class="font-semibold mb-1">Email</p>
                    <input type="email"
                        class="p-2 rounded-md border @error('email') border-red-primary @enderror w-full font-medium"
                        value="{{ old('email', auth()->user()->email) }}" name="email" autocomplete="off">
                    @error('email')
                        <span class="text-red-primary">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <p class="font-semibold mb-1">Telepon</p>
                    <input type="number"
                        class="p-2 rounded-md border @error('telepon') border-red-primary @enderror w-full font-medium"
                        value="{{ old('telepon', auth()->user()->telepon) }}" name="telepon" autocomplete="off">
                    @error('telepon')
                        <span class="text-red-primary font-medium">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <p class="font-semibold mb-1">Jenis kelamin</p>
                    <select
                        class="p-2 rounded-md cursor-pointer border @error('jk') border-red-primary @enderror w-full font-medium"
                        name="jk" autocomplete="off">
                        <option value="{{ auth()->user()->jk }}" selected>
                            {{ auth()->user()->jk }}
                        </option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jk')
                        <span class="text-red-primary font-medium">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-2.5 font-bold mt-4">Simpan
                perubahan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="/js/cropper.js"></script>
@endsection
