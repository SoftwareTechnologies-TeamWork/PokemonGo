<?php
session_start();
require_once ("../Database.php");

define("HOSTNANE", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "teamwork");

if (isset($_POST['currentDanger'])) {
    $id = $_POST['currentDanger'];
    $result = [];

    $db = new Database(HOSTNANE, USERNAME, PASSWORD, DATABASE);
    $queryString = "SELECT image, header, text FROM dangers WHERE id = ?";
    $query = $db->query($queryString);
    $query->bind_param("s", $id);
    $query->execute();

    $query->bind_result($image, $header, $text);

    while ($query->fetch()) {
        echo $image . "\n";
        echo $header . "\n";
        echo $text;
    }
}
?>