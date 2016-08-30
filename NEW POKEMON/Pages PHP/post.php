<?php
session_start();

require_once('Database.php');

define("HOSTNANE", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "teamwork");

if (isset($_SESSION['username'])) {
    $text = $_POST['text'];
    $user = $_SESSION['username'];

    $text = htmlspecialchars($text);
    $text = stripslashes($text);
    $text = trim($text);

    $db = new Database(HOSTNANE, USERNAME, PASSWORD, DATABASE);

    $chatQuery = "INSERT INTO chat (username, text) VALUES (?, ?)";

    $query = $db->query($chatQuery);
    $query->bind_param("ss", $user, $text);
    $query->execute();
}
?>