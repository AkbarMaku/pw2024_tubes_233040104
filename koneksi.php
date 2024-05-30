<?php 
        // Koneksi ke database
        $conn = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040104");

        // Cek koneksi
        if (mysqli_connect_errno()){
            echo "connection error : " . mysqli_connect_error();
        }

        // Fungsi hapus
        function hapus($id) {
            global $conn;
            mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori = $id");
        
            return mysqli_affected_rows($conn);
        }

        // Fungsi tambah
        function tambahProduk($data) {
            global $conn;
            
            $nama_produk = htmlspecialchars($data['namaPdk']);
            $harga_produk = htmlspecialchars($data['hargaPdk']);
            $deskripsi_produk = htmlspecialchars($data['deskPdk']);
            $kode_produk = htmlspecialchars($data['kodePdk']);
            $kategori = htmlspecialchars($data['id_kategori']);
            $foto_produk = ($data['fotoPdk']);

            $query = "INSERT INTO produk 
                      VALUES ('', '$nama_produk', '$harga_produk', '$deskripsi_produk', '$kode_produk', '$kategori', '$foto_produk')
                    ";

            mysqli_query($conn, $query) or die(mysqli_error($conn));
        }

        function query($query) {
            global $conn;

           $result = mysqli_query($conn,$query);
           
           $rows = [];
           while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
           }

           return $rows;
        }

        function cari($keyword) {
            $query = "SELECT * FROM kategori
                        WHERE
                      nama_kategori LIKE '%$keyword%'
                    ";

            return query($query);
        }