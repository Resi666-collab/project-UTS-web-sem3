<?php
session_start();
ob_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role']; // role dari form login

    // Cek user berdasarkan email dan role
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND role='$role'");
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            // Set session
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // Arahkan ke dashboard sesuai role
            if ($row['role'] == 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit;
        } else {
            echo "<script>
                    alert('Password salah!');
                    history.back();
                  </script>";
        }
    } else {
        echo "<script>
                alert('Akun tidak ditemukan atau role salah!');
                history.back();
              </script>";
    }
}
?>
