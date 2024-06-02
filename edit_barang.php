<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "UPDATE inventaris SET name='$name', quantity='$quantity', price='$price' WHERE id='$id'";

    if (mysqli_query($koneksi, $sql)) {
        echo "Data berhasil diupdate";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}


?>