<?php
$db = new mysqli("localhost", "root", "", "
users");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$db->set_charset("utf8");
$db->query("SET NAMES 'utf8'");
$db->query("SET CHARACTER SET utf8");
$db->query("SET SESSION collation_connection = 'utf8_general_ci'");
$db->query("SET SESSION sql_mode = ''");
$db->query("SET sql_mode = ''");
$db->query("SET sql_mode = 'NO_ENGINE_SUBSTITUTION'");
$db->query("SET sql_mode = 'NO_ENGINE_SUBSTITUTION,STRICT'");
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
if (empty($username) || empty($email) || empty($password)) {
    die("Please fill in all fields");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}
if (strlen($username) < 3 || strlen($username) > 20) {
    die("Username must be between 3 and 20 characters");
}
if (strlen($password) < 6 || strlen($password) > 20) {
    die("Password must be between 6 and 20 characters");
}
$db->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', SHA2('$password', 256))");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if ($db->affected_rows > 0) {
    echo "User registered successfully";
} else {
    echo "Error: " . $db->error;
}
$db->close();
