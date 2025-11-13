<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
        }
        nav {
            background-color: #007bff;
            padding: 10px 20px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .content {
            text-align: center;
            margin-top: 80px;
        }
        .card {
            display: inline-block;
            background: white;
            padding: 40px 60px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
        }
        .admin-menu, .user-menu {
            margin-top: 20px;
        }
        .admin-menu a, .user-menu a {
            display: inline-block;
            margin: 10px;
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
        }
        .admin-menu a:hover, .user-menu a:hover {
            background: #0056b3;
        }
        .logout {
            background: #dc3545 !important;
        }
        .logout:hover {
            background: #b02a37 !important;
        }
    </style>
</head>
<body>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <?php if ($_SESSION['role'] == 'admin') : ?>
            <a href="master_supplier.php">Master Supplier</a>
            <a href="master_product.php">Master Product</a>
            <a href="master_user.php">Master User</a>
        <?php endif; ?>
        <a href="logout.php" class="logout">Logout</a>
    </nav>

    <div class="content">
        <div class="card">
            <h2>Selamat Datang, <?= $_SESSION['username']; ?> 🎉</h2>
            <p>Role kamu: <b><?= $_SESSION['role']; ?></b></p>

            <?php if ($_SESSION['role'] == 'admin') : ?>
                <div class="admin-menu">
                    <h3>Menu Admin</h3>
                    <a href="master_supplier.php">Kelola Supplier</a>
                    <a href="master_product.php">Kelola Product</a>
                    <a href="master_user.php">Kelola User</a>
                </div>
            <?php else : ?>
                <div class="user-menu">
                    <h3>Menu User</h3>
                    <a href="profile.php">Lihat Profil</a>
                    <a href="produk_list.php">Lihat Produk</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
