<?php 
require '../koneksi.php';

$id = $_GET["id_user"];

if(hapusAdmin($id) > 0) {
    echo "<script>
        alert('Data berhasil dihapus');
        document.location='daftar-admin.php';
    </script>
    ";
} else {
    echo "<script>
        alert('Gagal menghapus data');
        document.location='daftar-admin.php';
    </script>
    ";
}
?>