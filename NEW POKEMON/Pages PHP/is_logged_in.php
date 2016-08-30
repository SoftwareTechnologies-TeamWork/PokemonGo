<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_SESSION['username'])) {
        echo $_SESSION['username'];
    } else {
        echo "Not logged in.";
    }
}
?>