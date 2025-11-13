<div class="container">
    <h2>Login</h2>

    <form action="proses_login.php" method="POST">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Masukkan Email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan Password" required>

        <label for="role">Login Sebagai</label>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>

        <button type="submit">Login</button>
    </form>

    <p>Belum punya akun? 
        <a href="index.php?page=register">Daftar di sini</a>
    </p>
</div>

<style>
.container {
    width: 320px;
    margin: 80px auto;
    background: #f9f9f9;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    color: #333;
}

label {
    display: block;
    margin-top: 10px;
    color: #555;
}

input, select {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

button {
    width: 100%;
    margin-top: 15px;
    padding: 10px;
    background-color: #a34048ff;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

button:hover {
    background-color: #772929ff;
}

p {
    text-align: center;
    margin-top: 10px;
}

a {
    color: #690a0aff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
</style>
