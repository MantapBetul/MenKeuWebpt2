<?php
if (isset($_POST['username']) && $_POST['username']) {
    // memasukan file koneksi ke database
    require_once 'koneksi.php';

    // menyimpan variable yang dikirim Form
    $username = $_POST['username'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];


    // SQL Insert
    $sql = "INSERT INTO users (username, email, password, gender) VALUES ('$username', '$email', '$password', '$gender')";

    $insert = $koneksi->query($sql);
    // jika gagal
    if (! $insert) {
        echo "<script>alert('".$koneksi->error."'); window.location.href = './register.php';</script>";
    } else {
        echo "<script>alert('Insert Data Berhasil'); window.location.href = './login.php';</script>";
    }
}
?>