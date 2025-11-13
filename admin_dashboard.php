<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php?page=login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #a34048;
            color: white;
            padding: 15px 0;
            text-align: center;
        }

        nav {
            background-color: #772929;
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

        h1 {
            color: #524949ff;
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
    <h2>Dashboard Admin</h2>
</header>

<nav>
    <a href="admin_dashboard.php">Dashboard</a> |
    <a href="master_user.php">Master User</a> |
    <a href="master_supplier.php">Master Supplier</a> |
    <a href="master_product.php">Master Product</a> |
    <a href="logout.php">Logout</a>
</nav>

<main>
    <h1>Hallo, <?= htmlspecialchars($_SESSION['username']); ?> 👋</h1>
    <p>Selamat datang di halaman Admin!</p>
</main>

<footer>
    <p>&copy; <?= date("Y"); ?> Sistem Admin</p>
</footer>

</body>
</html>
