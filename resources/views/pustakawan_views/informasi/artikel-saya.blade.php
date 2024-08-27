@extends('layouts.pustakawan-layout')
@section('content')
    @forelse ($articles as $item)
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <img src="{{ asset('storage/img/thumbnail/' . ($item->thumbnail ?? 'unknown_cover.png')) }}"
                            alt="" srcset="" class="w-100 rounded" loading="lazy">
                    </div>
                    <div class="col-md-7">
                        <a href="">
                            <h4 class="text-truncate text-bold text-dark">{{ $item->judul }}</h4>
                        </a>
                        <p class="truncate-text-article">{{ $item->deskripsi }}
                        </p>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex justify-content-end">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary">Action</button>
                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon"
                                    data-toggle="dropdown">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="{{ route('edit_article', $item->id) }}">Edit</a>
                                    <form action="{{ route('delete_article', $item->id) }}" method="post" id="delete-form-{{ $item->id }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="dropdown-item" onclick="confirmDelete('{{ $item->id }}')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="d-flex justify-content-center">
            <img src="/img/assets/oh_no_no_background.webp" alt="" srcset="" class="w-25">
        </div>
        <p class="text-center">Belum ada artikel yang kamu buat</p>
    @endforelse
@endsection
