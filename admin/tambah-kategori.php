<?php 
    require '../koneksi.php';
    
    if (isset($_POST['simpanKat'])) {
        $query = mysqli_query($conn, "INSERT INTO kategori (nama_kategori)
                                      VALUES ('$_POST[tkat]')");

        if ($query) {
            echo "<script>
                    alert('Tambah data berhasil');
                    document.location='kategori.php';
                </script>";
        } else {
            echo "<script>
                    alert('Tambah data gagal');
                    document.location='kategori.php';
                </script>";
        }
        
    }