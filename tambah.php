<?php 
    require 'functions.php';
    
    if (isset($_POST['submit'])) {
        $query = mysqli_query($conn, "INSERT INTO kategori (nama_kategori)
                                      VALUES ('$_POST[tkat]')");

        if ($query) {
            echo "<script>
                    alert('Simpan data berhasil');
                    document.location='index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Simpan data gagal');
                    document.location='index.php';
                </script>";
        }
        
    }
?>