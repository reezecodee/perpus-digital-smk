@extends('layouts.peminjam_layout')
@section('content')
<section class="container mx-auto px-12 text-gray-600">
    <div class="pt-36">
        <div class="flex">
            <div class="self-start w-full border shadow-md rounded-md p-4">
                <h1 class="text-xl font-bold mb-1">Notifikasi</h1>
                <hr class="mb-3">
                <?php if (true) : ?>
                        <div class="border rounded-lg p-2 mb-3">
                            <div class="flex items-center gap-4">
                                <img src="https://avatars.githubusercontent.com/u/159593076?v=4" width="70" class="rounded-full" alt="" srcset="">
                                <div>
                                    <a href="">
                                        <h1 class="text-lg font-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, totam.</h1>
                                    </a>
                                    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam voluptate exercitationem nostrum nulla. Consequatur rem nisi similique, dolor fugit laborum?</p>
                                    <p class="text-xs font-bold">From: Acumalaka</p>
                                </div>
                            </div>
                        </div>
                <?php else : ?>
                    <div class="flex justify-center">
                        <img src="https://img.freepik.com/free-vector/reminders-concept-illustration_114360-4278.jpg?t=st=1718678017~exp=1718681617~hmac=03486e2c7f75d0a8659aa431896b5c439d94d0784da90ee0cd92183f3a4b9b10&w=740" alt="" srcset="" width="300" class="block">
                    </div>
                    <h1 class="text-black text-center text-lg font-semibold">Belum ada notifikasi yang masuk</h1>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
@endsection