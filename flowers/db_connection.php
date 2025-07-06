<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "timeless_boutiques";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to ensure proper display of data
$conn->set_charset("utf8mb4");

function sanitize($conn, $data) {
    return mysqli_real_escape_string($conn, trim($data)); 
}
function login() {
    return isset($_SESSION["login"]) && $_SESSION["login"] === true;
}
function not_login() {
    if (!login()) {
        header("location: login.php");
        exit;
    }
}
function user_id() {
    return login() ? $_SESSION["id"] : null;
}
function getUserFullName() {
    if (login()) {
        return $_SESSION["first_name"] . " " . $_SESSION["last_name"];
    }
    return "";
}

// Function to handle database errors
function handleDBError($conn, $query) {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>
<!--Coded by Xamarys Liranzo, Santiago Murillo, and Jean Malinao-->