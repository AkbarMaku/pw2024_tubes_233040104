<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040104");

// Cek koneksi
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

// Fungsi untuk memeriksa apakah id_kategori ada di tabel kategori
function checkKategoriExists($kategori)
{
    global $conn;
    $query = "SELECT id_kategori FROM kategori WHERE id_kategori = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $kategori);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $exists = mysqli_stmt_num_rows($stmt) > 0;
        mysqli_stmt_close($stmt);
        return $exists;
    } else {
        die('Prepare failed: ' . mysqli_error($conn));
    }
}

// Fungsi untuk mengunggah file
function uploadFile($file)
{
    $targetDir = "uploads/";
    $fileName = basename($file["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    $maxFileSize = 2 * 1024 * 1024; // 2MB
    $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');

    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        return false;
    }

    if ($file["size"] > $maxFileSize) {
        return false;
    }

    if (!in_array($fileType, $allowedTypes)) {
        return false;
    }

    if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
        return $targetFilePath;
    } else {
        return false;
    }
}

// Fungsi tambah produk
function tambahProduk($data, $file)
{
    global $conn;

    $nama_produk = htmlspecialchars($data['namaPdk']);
    $harga_produk = htmlspecialchars($data['hargaPdk']);
    $deskripsi_produk = htmlspecialchars($data['deskPdk']);
    $kode_produk = htmlspecialchars($data['kodePdk']);
    $kategori = htmlspecialchars($data['id_kategori']);

    if (!checkKategoriExists($kategori)) {
        die('Kategori tidak ditemukan.');
    }

    $foto_produk = uploadFile($file);
    if (!$foto_produk) {
        die('Upload file gagal');
    }

    $query = "INSERT INTO produk (nama_produk, harga_produk, deskripsi_produk, kode_produk, id_kategori, img) 
              VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "sdssis", $nama_produk, $harga_produk, $deskripsi_produk, $kode_produk, $kategori, $foto_produk);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                    alert('Tambah data berhasil');
                    document.location='produk.php';
                </script>";
        } else {
            die('Execute failed: ' . mysqli_error($conn));
        }
    } else {
        die('Prepare failed: ' . mysqli_error($conn));
    }
}

// Fungsi untuk mengambil semua kategori dari database
function getKategori()
{
    global $conn;
    $query = "SELECT id_kategori, nama_kategori FROM kategori";
    $result = mysqli_query($conn, $query);
    $kategori = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $kategori[] = $row;
        }
    } else {
        die('Query failed: ' . mysqli_error($conn));
    }
    return $kategori;
}

// Fungsi untuk mengambil semua produk dari database
function getProduk()
{
    global $conn;
    $query = "SELECT id_produk,
                     nama_produk,
                     harga_produk,
                     deskripsi_produk,
                     kode_produk,
                     img
              FROM produk";
    $result = mysqli_query($conn, $query);
    $produk = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $produk[] = $row;
        }
    } else {
        die('Query failed: ' . mysqli_error($conn));
    }
    return $produk;
}

// Fungsi untuk mengambil data produk berdasarkan id_produk
function getProdukById($id_produk)
{
    global $conn;
    $query = "SELECT * FROM produk WHERE id_produk = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id_produk);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $produk = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        return $produk;
    } else {
        die('Prepare failed: ' . mysqli_error($conn));
    }
}

// Fungsi query
function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Fungsi hapus kategori
function hapusKategori($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori = $id");

    return mysqli_affected_rows($conn);
}

// Fungsi hapus produk
function hapusProduk($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id");

    return mysqli_affected_rows($conn);
}

// Fungsi hapus produk
function hapusAdmin($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id_user = $id");

    return mysqli_affected_rows($conn);
}

// Fungsi ubah produk
function ubahPdk($data)
{
    global $conn;

    $id = $data["id"];
    $nama_produk = htmlspecialchars($data['namaPdk']);
    $harga_produk = htmlspecialchars($data['hargaPdk']);
    $deskripsi_produk = htmlspecialchars($data['deskPdk']);
    $kode_produk = htmlspecialchars($data['kodePdk']);
    $kategori = htmlspecialchars($data['id_kategori']);

    // Jika ada file yang diunggah, proses file tersebut
    if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $foto_produk = uploadFile($_FILES['img']);
        if (!$foto_produk) {
            die('Upload file gagal');
        }
    } else {
        // Jika tidak ada file yang diunggah, gunakan file lama
        $foto_produk = $data['img_lama'];
    }

    $query = "UPDATE produk SET
                nama_produk = '$nama_produk',
                harga_produk = '$harga_produk',
                deskripsi_produk = '$deskripsi_produk',
                kode_produk = '$kode_produk',
                id_kategori = '$kategori',
                img = '$foto_produk'
              WHERE id_produk = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Fungsi ubah admin
function ubahAdmin($data)
{
    global $conn;

    $id = $data["id"];
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Konfirmasi username
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                 alert('username yang dipilih sudah terdaftar');
             </script>";

        return false;
    }

    // Cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                 alert('konfirmasi password tidak sesuai');
             </script>";

        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE user SET
                username = '$username',
                password = '$password'
              WHERE id_user = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Fungsi cari kategori
function cariKat($keywordKat)
{
    $query = "SELECT * FROM kategori
                        WHERE
                      nama_kategori LIKE '%$keywordKat%'
                    ";

    return query($query);
}

// Fungsi cari produk
function cariPdk($keywordPdk)
{
    $query = "SELECT * FROM produk
                        WHERE
                      nama_produk LIKE '%$keywordPdk%'
                    ";

    return query($query);
}

// Fungsi registrasi
function register($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Konfirmasi username
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username yang dipilih sudah terdaftar');
            </script>";

        return false;
    }

    // Cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
            </script>";

        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Menambah user baru ke database
    mysqli_query($conn, "INSERT INTO user (username, password) VALUES('$username', '$password')");

    return mysqli_affected_rows($conn);
}