<?php
require_once('../Database.php');

define("HOSTNANE", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "teamwork");

$db = new Database(HOSTNANE, USERNAME, PASSWORD, DATABASE);

$result = [];

$loadQuery = "SELECT username, text, data FROM chat";

$query = $db->query($loadQuery);
$query->execute();
$query->bind_result($username, $text, $data);

while ($query->fetch()) {
    $result[] = "<div class='msgln'>(" . $data . ") <b>" . $username . "</b>: " . $text . "<br></div>";
}

echo implode("", $result);
?>