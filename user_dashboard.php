<?php
session_start();
include 'koneksi.php';

// Pastikan hanya user yang bisa akses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: index.php?page=login");
    exit;
}

// Ambil data user dari database pakai username (bukan id)
$username = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

if ($query && mysqli_num_rows($query) > 0) {
    $user = mysqli_fetch_assoc($query);
} else {
    // fallback kalau user gak ketemu
    $user = ['nama' => $_SESSION['username'], 'foto' => 'default.png'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #70aadaff;
            color: white;
            padding: 15px 0;
            text-align: center;
        }

        nav {
            background-color: #8fbce6ff;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            text-align: center;
            margin-top: 50px;
        }

        .profile {
            background-color: white;
            display: inline-block;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        .profile img {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #7dbfc4ff;
        }

        h1 {
            color: #333;
        }

        footer {
            text-align: center;
            margin-top: 60px;
            color: #777;
        }
    </style>
</head>
<body>

<header>
    <h2>Dashboard User</h2>
</header>

<nav>
    <a href="user_dashboard.php">Dashboard</a> |
    <a href="product_user.php">Product</a> |
    <a href="logout.php">Logout</a>
</nav>

<main>
    <h1>Hallo, <?= htmlspecialchars($_SESSION['username']); ?> 👋</h1>
    <p>Selamat datang di halaman User!</p>
</main>

<footer>
    <p>&copy; <?= date("Y"); ?> Sistem User</p>
</footer>

</body>
</html>
