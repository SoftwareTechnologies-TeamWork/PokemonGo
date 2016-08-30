<?php
require_once('Register.php');
require_once('Database.php');

define("HOSTNANE", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "teamwork");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    } else {
        $username = "";
    }

    if (isset($_POST['username'])) {
        $password = $_POST['password'];
    } else {
        $password = "";
    }

    if (isset($_POST['username'])) {
        $confirm_password = $_POST['confirm_password'];
    } else {
        $confirm_password = "";
    }

    if (isset($_POST['username'])) {
        $email = $_POST['email'];
    } else {
        $email = "";
    }

    if (isset($_POST['username'])) {
        $fullname = $_POST['full_name'];
    } else {
        $fullname = "";
    }

    $hashed_password = md5($password);

    $register = new Register($username, $password, $confirm_password, $email, $fullname);

    $usernameError = $register->checkUsername();
    $passwordError = $register->checkPassword();
    $passwordMatchError = $register->checkIfPasswordsMatch();
    $emailError = $register->checkEmail();
    $fullnameError = $register->checkFullname();

    if ($usernameError != "" || $passwordError != "" || $passwordMatchError != ""
        || $emailError != "" || $fullnameError != "") {

        /*$array[0] = $usernameError;
        $array[1] = $passwordError;
        $array[2] = $passwordMatchError;
        $array[3] = $emailError;
        $array[4] = $fullnameError;*/

        if ($usernameError == "") $usernameError = "empty";
        if ($passwordError == "") $passwordError = "empty";
        if ($passwordMatchError == "") $passwordMatchError = "empty";
        if ($emailError == "") $emailError = "empty";
        if ($fullnameError == "") $fullnameError = "empty";

        echo $usernameError . "\n";
        echo $passwordError . "\n";
        echo $passwordMatchError . "\n";
        echo $emailError . "\n";
        echo $fullnameError . "\n";

        //echo json_encode($array);
    } else {
        $db = new Database(HOSTNANE, USERNAME, PASSWORD, DATABASE);

        $queryString = "INSERT INTO users (username, password, email, fullname) VALUES (?, ?, ?, ?)";

        $query = $db->query($queryString);
        $query->bind_param("ssss", $username, $hashed_password, $email, $fullname);
        $query->execute();

        if ($query->affected_rows == 0) {
            echo "fail";

            //echo json_encode($array);
        } else {
            echo "success";

            //echo json_encode($array);
        }
    }
}
?>