<?php session_start(); include 'db.php'; ?>
<?php
if(isset($_POST['login'])){
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $res=$conn->query("SELECT * FROM users WHERE username='$user'");
    $row=$res->fetch_assoc();
    if($row && password_verify($pass,$row['password'])){
        $_SESSION['user_id']=$row['id'];
        header("Location: dashboard.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>
<body>
<div class="container">
<form method="POST" class="form-box">
<h2>Welcome Back</h2>
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button name="login">Login</button>
<p>Don't have an account? <a href="register.php">Register</a></p>
</form>
</div>
</body>
</html>