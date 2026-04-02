<?php session_start(); include 'db.php';
$key = "my_secret_key_123"; // 🔐 encryption key

if (!is_dir('uploads')) {
    mkdir('uploads', 0777, true);
}
$target = "uploads/" . basename($_FILES['file']['name']) . ".enc";

$data = file_get_contents($_FILES['file']['tmp_name']);
$encrypted = openssl_encrypt($data, "AES-128-ECB", $key);

if(file_put_contents($target, $encrypted)){
    $uid = $_SESSION['user_id'];
    $name = $_FILES['file']['name'];
    $conn->query("INSERT INTO files(user_id,filename,filepath) VALUES($uid,'$name','$target')");
}
header("Location: dashboard.php");
?>