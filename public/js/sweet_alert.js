function confirmAdd() {
  event.preventDefault();

  Swal.fire({
      title: 'Apakah kamu yakin ingin menambah data ini',
      text: "Pastikan data yang kamu inputkan sudah benar",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, tentu!',
      cancelButtonText: 'Batalkan'
  }).then((result) => {
      if (result.isConfirmed) {
          document.getElementById(`add-form`).submit();
      }
  });
}

function confirmSendNotif() {
  event.preventDefault();

  Swal.fire({
      title: 'Apakah kamu yakin ingin mengirimkan notifikasi ini',
      text: "Pastikan data yang kamu inputkan sudah benar",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, kirimkan!',
      cancelButtonText: 'Batalkan'
  }).then((result) => {
      if (result.isConfirmed) {
          document.getElementById(`notif-form`).submit();
      }
  });
}

function confirmCreateArticle() {
  event.preventDefault();

  Swal.fire({
      title: 'Apakah kamu yakin ingin membuat artikel ini',
      text: "Pastikan informasi yang kamu inputkan sudah benar",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, buat!',
      cancelButtonText: 'Batalkan'
  }).then((result) => {
      if (result.isConfirmed) {
          document.getElementById(`article-form`).submit();
      }
  });
}

function confirmUpdate() {
  event.preventDefault();

  Swal.fire({
      title: 'Apakah kamu yakin ingin merubah data ini',
      text: "Pastikan data yang kamu ubah sudah benar",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, tentu!',
      cancelButtonText: 'Batalkan'
  }).then((result) => {
      if (result.isConfirmed) {
          document.getElementById(`update-form`).submit();
      }
  });
}

function confirmDelete(itemId) {
  event.preventDefault();

  Swal.fire({
      title: 'Apakah kamu yakin ingin menghapus ini',
      text: "Data yang dihapus tidak dapat dikembalikan lagi",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, tentu!',
      cancelButtonText: 'Batalkan'
  }).then((result) => {
      if (result.isConfirmed) {
          document.getElementById(`delete-form-${itemId}`).submit();
      }
  });
}

document.addEventListener('DOMContentLoaded', function () {
  let successMessage = document.querySelector('meta[name="flash-message-success"]');
  
  if (successMessage) {
      Swal.fire({
          title: 'Sukses!',
          text: successMessage.content,
          icon: 'success',
          confirmButtonText: 'Oke'
      });
  }
});

document.addEventListener('DOMContentLoaded', function () {
  let errorMessage = document.querySelector('meta[name="flash-message-error"]');
  
  if (errorMessage) {
      Swal.fire({
          title: 'Gagal!',
          text: errorMessage.content,
          icon: 'error',
          confirmButtonText: 'Oke'
      });
  }
});