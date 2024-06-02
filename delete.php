<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $sql = "DELETE FROM inventaris WHERE id='$id'";
    if (mysqli_query($koneksi, $sql)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>