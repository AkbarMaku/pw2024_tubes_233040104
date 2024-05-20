<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040104");

// check connection
if (mysqli_connect_errno()){
    echo "connection error : " . mysqli_connect_error();
}
?>