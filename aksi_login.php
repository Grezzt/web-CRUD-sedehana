<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE username = '$name'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($password === $row['password']) {
            $_SESSION['name'] = $row['username'];
            $_SESSION['login'] = $row['level'];
            header('Location: admin.php');
            exit();
        } else {
            header("Location: login.php");
            exit();
        }
    } else {
        header("Location: login.php");
        exit();
    }
}
?>