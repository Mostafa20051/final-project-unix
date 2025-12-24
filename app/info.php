<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("db", "appuser", "apppass", "dictionary_app");
if ($conn->connect_error) {
    die("DB connection failed: " . $conn->connect_error);
}

if (isset($_GET['word'])) {
    $word = trim($_GET['word']);

    $stmt = $conn->prepare("SELECT machine_word FROM words WHERE input_word=?");
    $stmt->bind_param("s", $word);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res && $res->num_rows > 0) {
        echo $res->fetch_assoc()['machine_word'];
    } else {
        echo "Term not found";
    }
}

$conn->close();

?>
