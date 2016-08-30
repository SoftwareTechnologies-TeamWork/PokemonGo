<?php
session_start();

require_once("Database.php");

define("HOSTNANE", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "teamwork");

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $pass = md5($pass);

    $databaseUsername = "";
    $databasePassword = "";
    $result = "";

    $db = new Database(HOSTNANE, USERNAME, PASSWORD, DATABASE);
    $queryString = "SELECT username, password FROM users WHERE username = ?";
    $query = $db->query($queryString);
    $query->bind_param("s", $user);
    $query->execute();

    $query->bind_result($username, $password);

    while ($query->fetch()) {
        $databasePassword = $password;
        $databaseUsername = $username;
    }

    if ($pass == $databasePassword) {
        $result = "success";
        $_SESSION['username'] = $user;
    } else {
        $result = "Incorrect username or password!";
    }

    if ($databaseUsername != $user) {
        $result = "User not found!";
    }

    echo $result;
}
?>