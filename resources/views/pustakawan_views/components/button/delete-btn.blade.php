<form id="delete-form-{{ $id }}" class="d-inline"
    action="{{ route('delete_user', $id) }}" method="post" title="Hapus">
    @method('DELETE')
    @csrf
    <button type="button" onclick="confirmDelete('{{ $id }}')" class="btn btn-danger">
        <i class="fas fa-trash"></i>
    </button>
</form>