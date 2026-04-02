<?php include 'db.php'; ?>
<?php
if(isset($_POST['register'])){
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $conn->query("INSERT INTO users(username,password) VALUES('$user','$pass')");
    
    header("Location: login.php"); // Automatically take them to login!
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<form method="POST" class="form-box">
<h2>Create Account</h2>
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button name="register">Register</button>
<p>Already have an account? <a href="login.php">Login</a></p>
</form>
</div>
</body>
</html>