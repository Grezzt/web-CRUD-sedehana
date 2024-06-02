<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])){
    $name = $_POST['name'];
    $password = $_POST['password'];

//select data
    $query = "SELECT * FROM admin WHERE username = '$name' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['name'] = $row['name'];
    $_SESSION['login'] = $row['level'];
    header('location:admin.php');
} else {
    header("user tidak ditemukan");
}
}
?>