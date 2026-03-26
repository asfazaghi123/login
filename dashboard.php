<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<style>
body {
  font-family: Arial;
  background: #f5f5f5;
  text-align: center;
  padding: 50px;
}
.box {
  background: white;
  padding: 30px;
  border-radius: 10px;
  display: inline-block;
}
a {
  display: inline-block;
  margin-top: 20px;
  background: black;
  color: white;
  padding: 10px;
  text-decoration: none;
}
</style>
</head>

<body>
<div class="box">
  <h2>Halo, <?= $_SESSION['user']; ?> 👋</h2>
  <p>Login pada: <?= $_SESSION['login_time']; ?></p>

  <a href="logout.php">Logout</a>
</div>
</body>
</html>
