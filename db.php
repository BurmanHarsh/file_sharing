<?php
// Connect to MySQL server first without selecting a database
$conn = new mysqli("localhost", "root", "");

if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
}

// 1. Create the database automatically if it doesn't exist
$conn->query("CREATE DATABASE IF NOT EXISTS file_sharing");

// 2. Select that newly created/existing database
$conn->select_db("file_sharing");

// 3. Create the 'users' table automatically if it doesn't exist
$conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
)");

// 4. Create the 'files' table automatically if it doesn't exist
$conn->query("CREATE TABLE IF NOT EXISTS files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL
)");

// 5. Create the 'downloads' tracking table automatically if it doesn't exist
$conn->query("CREATE TABLE IF NOT EXISTS downloads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_id INT NOT NULL
)");
?>