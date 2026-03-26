<?php
session_start();
if (isset($_SESSION['user'])) { header("Location: dashboard.php"); exit(); }

$error = '';
$users = ['admin' => 'admin123', 'budi' => 'budi123'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username'] ?? '');
    $p = $_POST['password'] ?? '';

    if (isset($users[$u]) && $users[$u] === $p) {
        $_SESSION['user'] = $u;
        $_SESSION['login_time'] = date('d M Y, H:i');
        header("Location: dashboard.php"); 
        exit();
    }
    $error = 'Username atau password salah!';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login</title>
<style>
body {
  font-family: Arial;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: linear-gradient(135deg, #667eea, #764ba2);
}
.card {
  background: rgba(255,255,255,0.1);
  padding: 30px;
  border-radius: 10px;
  color: white;
  width: 300px;
}
input, button {
  width: 100%;
  padding: 10px;
  margin: 8px 0;
  border-radius: 5px;
  border: none;
}
button {
  background: black;
  color: white;
}
.err {
  background: rgba(255,0,0,0.3);
  padding: 8px;
  border-radius: 5px;
}
</style>
</head>

<body>
<div class="card">
  <h2>Login</h2>

  <?php if ($error): ?>
    <div class="err"><?= $error ?></div>
  <?php endif; ?>

  <form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Masuk</button>
  </form>

  <p style="font-size:12px;">
    admin / admin123 <br>
    budi / budi123
  </p>
</div>
</body>
</html>
