<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f3f4f6;
            text-align: center;
            padding-top: 100px;
        }
        .card {
            display: inline-block;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 { color: #333; }
        a {
            display: block;
            width: 220px;
            margin: 15px auto;
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: 0.2s;
        }
        .admin { background-color: #3577a3ff; }
        .user { background-color: #3577a3ff; }
        .register { background-color: #f81e30ff; }
        a:hover { opacity: 0.85; transform: scale(1.02); }
    </style>
</head>
<body>
    <div class="card">
        <h2>Silakan Pilih Login</h2>
        <a href="login.php?role=admin" class="admin">Login sebagai Admin</a>
        <a href="login.php?role=user" class="user">Login sebagai User</a>
        <a href="register.php" class="register">Register Akun Baru</a>

    </div>
</body>
</html>
