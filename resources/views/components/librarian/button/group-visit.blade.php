<div class="btn-group">
    <button type="button" class="btn btn-info">Action</button>
    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" role="menu" style="">
        <a class="dropdown-item" href="{{ route('edit_kunjungan', $item->id) }}">Edit</a>
        <form action="{{ route('delete_visit', $item->id) }}" method="post" id="delete-form-{{ $item->id }}">
            @csrf
            @method('DELETE')
            <button type="button" class="dropdown-item" href="javascript:void(0)"
                onclick="confirmDelete('{{ $item->id }}')">Hapus</button>
        </form>
    </div>
</div>
