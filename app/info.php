<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("db", "appuser", "apppass", "dictionary_app");

if ($conn->connect_error) {
    die("DB connection failed: " . $conn->connect_error);
}

if (isset($_GET['word'])) {
    $word = $conn->real_escape_string($_GET['word']);
    $sql = "SELECT machine_word FROM words WHERE input_word='$word'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['machine_word'];
    } else {
        echo "Term not found";
    }
}

$conn->close();
?>
