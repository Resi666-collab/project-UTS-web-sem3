<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $nim      = mysqli_real_escape_string($conn, $_POST['nim']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role     = mysqli_real_escape_string($conn, $_POST['role']);

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan ke database
    $query = "INSERT INTO users (username, nim, email, password, role)
              VALUES ('$username', '$nim', '$email', '$hashed_password', '$role')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Registrasi berhasil! Silakan login.');
                window.location.href='index.php?page=login';
              </script>";
    } else {
        echo "<script>
                alert('Terjadi kesalahan: " . mysqli_error($conn) . "');
                window.history.back();
              </script>";
    }
}
?>
