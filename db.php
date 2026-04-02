<?php
$conn = new mysqli("localhost", "root", "", "file_sharing");
if($conn->connect_error){ die("Connection failed"); }
?>