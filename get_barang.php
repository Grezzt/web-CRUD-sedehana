<?php
include 'koneksi.php';

// Ambil ID barang dari parameter GET
$id = $_GET['id'];

// Query untuk mengambil data barang berdasarkan ID
$sql = "SELECT id, name, quantity, price FROM barang WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    header('Content-Type: application/json');
    echo json_encode($row);
} else {
    echo "Data barang tidak ditemukan";
}
?>