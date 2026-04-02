<?php include 'db.php';
$key = "my_secret_key_123"; // same key

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM files WHERE id=$id");
$row = $res->fetch_assoc();

$conn->query("INSERT INTO downloads(file_id) VALUES($id)");

$encrypted = file_get_contents($row['filepath']);
$decrypted = openssl_decrypt($encrypted, "AES-128-ECB", $key);

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.$row['filename'].'"');
echo $decrypted;
?>
