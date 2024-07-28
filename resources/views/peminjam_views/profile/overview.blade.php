@extends('layouts.peminjam_layout')
@section('content')
    <section class="mx-auto px-3 lg:px-12 text-gray-600">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="pt-24 lg:pt-36">
                <div class="flex flex-col lg:flex-row gap-3">
                    @include('partials.peminjam.sidebar')
                    <div class="self-start w-full border shadow-md rounded-md p-4">
                        <h1 class="text-xl font-bold mb-1">Profile saya</h1>
                        <hr class="mb-3">
                        <p class="font-semibold mb-2">Foto profile</p>
                        <div class="flex gap-4 items-center mb-1">
                            <img src="/img/unknown_profile.jpg" width="90" id="preview-profile" class="rounded-full">
                            <input type="file" name="foto_profile" accept=".png, .jpg, .jpeg" class="hidden"
                                id="file-input">
                            <button type="button" id="trigger-input-file"
                                class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-2 font-bold"><i
                                    class="fas fa-upload"></i> Upload
                                foto</button>
                            <!-- <button class="border border-red-primary text-red-primary hover:bg-red-primary hover:text-white duration-300 rounded-md text-sm p-2 font-bold">Hapus
                                    foto</button> -->
                        </div>
                        <p class="text-sm mb-3">Ukuran foto maksimal sebesar 5MB dan harus berformat jpg, jpeg, atau png.
                        </p>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <p class="font-semibold mb-1">Nama lengkap</p>
                                <input type="text" class="p-2 rounded-md border w-full font-medium"
                                    value="Ambatukam ambasing" name="nama">
                            </div>
                            <div>
                                <p class="font-semibold mb-1">Username</p>
                                <input type="text" class="p-2 rounded-md border w-full font-medium" value="ambatukam"
                                    name="username">
                            </div>
                            <div>
                                <p class="font-semibold mb-1">Alamat email</p>
                                <input type="text" class="p-2 rounded-md border w-full font-medium"
                                    value="acumalaka@gmail.com" name="email">
                            </div>
                            <div>
                                <p class="font-semibold mb-1">Jenis kelamin</p>
                                <select class="p-2 rounded-md border w-full font-medium cursor-pointer" name="jk">
                                    <option value="" selected>Laki-laki</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit"
                            class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-2.5 font-bold mt-4"><i
                                class="fas fa-save"></i> Simpan perubahan</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <script src="/js/profile.js"></script>
@endsection
