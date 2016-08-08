<?php
require_once('Register.php');
require_once('Database.php');

define("HOSTNANE", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "teamwork");

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['email'])
    && isset($_POST['full_name']) && $_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = md5($password);
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $fullname = $_POST['full_name'];

    $register = new Register($username, $password, $confirm_password, $email, $fullname);

    $usernameError = $register->checkUsername();
    $passwordError = $register->checkPassword();
    $passwordMatchError = $register->checkIfPasswordsMatch();
    $emailError = $register->checkEmail();
    $fullnameError = $register->checkFullname();

    if ($usernameError != "" && $passwordError != "" && $passwordMatchError != ""
        && $emailError != "" && $fullnameError != "") {

        $array[0] = $usernameError;
        $array[1] = $passwordError;
        $array[2] = $passwordMatchError;
        $array[3] = $emailError;
        $array[4] = $fullnameError;

        echo json_encode($array);
    } else {
        $db = new Database(HOSTNANE, USERNAME, PASSWORD, DATABASE);

        $queryString = "INSERT INTO users (username, password, email, fullname) VALUES (?, ?, ?, ?)";

        $query = $db->query($queryString);
        $query->bind_param("ssss", $username, $hashed_password, $email, $fullname);
        $query->execute();

        if ($query->affected_rows == 0) {
            $array[0] = "f";
            $array[1] = "a";
            $array[2] = "i";
            $array[3] = "l";
            $array[4] = "l";

            echo json_encode($array);
        } else {
            $array[0] = "success";

            echo json_encode($array);
        }
    }
}
?>