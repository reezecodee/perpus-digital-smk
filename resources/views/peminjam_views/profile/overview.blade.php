@extends('layouts.profile_layout')
@section('content-card')
    <div class="self-start w-full border shadow-md rounded-md p-4">
        <h1 class="text-xl font-bold mb-1">Profile saya</h1>
        <hr class="mb-3">
        <p class="font-semibold mb-2">Foto profile</p>
        <div class="flex gap-4 items-center mb-1">
            <img src="/img/unknown_profile.jpg" width="90" id="preview-profile" class="rounded-full">
            <input type="file" name="foto_profile" accept=".png, .jpg, .jpeg" class="hidden" id="file-input">
            <button type="button" id="trigger-input-file"
                class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-2 font-bold"><i
                    class="fas fa-upload"></i> Upload
                foto</button>
            <!-- <button class="border border-red-primary text-red-primary hover:bg-red-primary hover:text-white duration-300 rounded-md text-sm p-2 font-bold">Hapus
                                                                        foto</button> -->
        </div>
        <p class="text-sm mb-3">Ukuran foto maksimal sebesar 5MB dan harus berformat jpg, jpeg, atau png.
        </p>
        <form action="" method="post" enctype="multipart/form-data">

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <p class="font-semibold mb-1">Username</p>
                    <input type="text"
                        class="p-2 rounded-md border @error('username') border-red-primary @enderror w-full font-medium"
                        value="{{ auth()->user()->username }}" name="username" autocomplete="off">
                </div>
                <div>
                    <p class="font-semibold mb-1">Nama lengkap</p>
                    <input type="text"
                        class="p-2 rounded-md border @error('nama') border-red-primary @enderror w-full font-medium"
                        value="{{ auth()->user()->nama }}" name="nama" autocomplete="off">
                    @error('nama')
                        <span class="text-red-primary">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <p class="font-semibold mb-1">NIS</p>
                    <input type="number"
                        class="p-2 rounded-md border @error('nip_nis') border-red-primary @enderror w-full font-medium"
                        value="{{ auth()->user()->nip_nis }}" name="nip_nis" autocomplete="off">
                    @error('nip_nis')
                        <span class="text-red-primary">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <p class="font-semibold mb-1">NISN</p>
                    <input type="number"
                        class="p-2 rounded-md border @error('nip_nis') border-red-primary @enderror w-full font-medium"
                        value="{{ auth()->user()->nisn }}" name="nisn" autocomplete="off">
                    @error('nisn')
                        <span class="text-red-primary">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <p class="font-semibold mb-1">Email</p>
                    <input type="email"
                        class="p-2 rounded-md border @error('email') border-red-primary @enderror w-full font-medium"
                        value="{{ auth()->user()->email }}" name="email" autocomplete="off">
                    @error('email')
                        <span class="text-red-primary">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <p class="font-semibold mb-1">Telepon</p>
                    <input type="number"
                        class="p-2 rounded-md border @error('telepon') border-red-primary @enderror w-full font-medium"
                        value="{{ auth()->user()->telepon }}" name="telepon" autocomplete="off">
                    @error('telepon')
                        <span class="text-red-primary">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <p class="font-semibold mb-1">Jenis kelamin</p>
                    <input type="text"
                        class="p-2 rounded-md border @error('jk') border-red-primary @enderror w-full font-medium"
                        value="{{ auth()->user()->jk }}" name="jk" autocomplete="off">
                    @error('jk')
                        <span class="text-red-primary">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <p class="font-semibold mb-1">Status</p>
                    <input type="text"
                        class="p-2 rounded-md border @error('status') border-red-primary @enderror w-full font-medium"
                        value="{{ auth()->user()->status }}" name="status" autocomplete="off">
                    @error('status')
                        <span class="text-red-primary">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="bg-red-primary hover:bg-red-500 rounded-md text-white text-sm p-2.5 font-bold mt-4">Simpan
                perubahan</button>
        </form>
    </div>
@endsection
