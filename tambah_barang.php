<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaBarang = $_POST['namaBarang'];
    $quantityBarang = $_POST['quantityBarang'];
    $hargaBarang = $_POST['hargaBarang'];

    $query = "INSERT INTO inventaris (name, quantity, price) VALUES ('$namaBarang', '$quantityBarang', '$hargaBarang')";
    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>
