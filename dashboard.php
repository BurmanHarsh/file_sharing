<?php session_start(); include 'db.php';
if(!isset($_SESSION['user_id'])) header("Location: login.php");
$uid = $_SESSION['user_id'];
$resUser = $conn->query("SELECT username FROM users WHERE id=$uid");
$user = $resUser->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
    <h3>📁 File Sharing System</h3>
    
    <div class="nav-right">
        <span>👤 <?php echo $user['username']; ?></span>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="dashboard-container">
    <h2 style="text-align:center;color:white;margin-top:0;">Your Files</h2>
    
    <form action="upload.php" method="POST" enctype="multipart/form-data" class="upload-form">
        <input type="file" name="file" required>
        <button>Upload</button>
    </form>

    <table>
    <tr><th>File</th><th>Action</th></tr>
    <?php
    $uid=$_SESSION['user_id'];
    $res=$conn->query("SELECT * FROM files WHERE user_id=$uid");
    while($row=$res->fetch_assoc()){
     echo "<tr><td>{$row['filename']}</td><td><a href='download.php?id={$row['id']}' class='btn-download'>Download</a></td></tr>";
    }
    ?>
    </table>
</div>

</body>
</html>