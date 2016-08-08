<?php
define ("USERNAME_PATTERN", "/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/");
define ("PASSWORD_PATTERN", "/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/");

class Register
{
    private $username, $password, $confirmPassword, $email, $fullname;
    private $usernameError, $passwordError, $passwordMatchError, $emailError, $fullnameError;

    public function __construct($username, $password, $confirmPassword, $email, $fullname)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->fullname = $fullname;
    }

    public function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    public function checkUsername() {
        if (empty($this->username)) {
            $this->usernameError = "Username field cannot be empty!";
        } else {
            $this->username = $this->testInput($this->username);
            if (strlen($this->username) < 4) {
                $this->usernameError = "Username cannot be less than 4 characters!";
            } else {
                if (!preg_match(USERNAME_PATTERN, $this->username)) {
                    $this->usernameError = "Username must contain only letters,digits, - , _";
                }
            }
        }
        
        return $this->usernameError;
    }

    public function checkPassword() {
        if (empty($this->password)) {
            $this->passwordError = "Password field cannot be empty!";
        } else {
            $this->password = $this->testInput($this->password);
            if (strlen($this->password) < 6) {
                $this->passwordError = "Password cannot be less than 6 characters!";
            } else {
                if (!preg_match(PASSWORD_PATTERN, $this->password)) {
                    $this->passwordError = "Password must contain at least one letter and a digit";
                }
            }
        }

        return $this->passwordError;
    }

    public function checkIfPasswordsMatch() {
        if (empty($this->confirmPassword)) {
            $this->passwordMatchError = "Confirm password field cannot be empty!";
        } else {
            $this->confirmPassword = $this->testInput($this->confirmPassword);
            if ($this->password != $this->confirmPassword) {
                $this->passwordMatchError = "Entered passwords does not match!";
            }
        }

        return $this->passwordMatchError;
    }

    public function checkEmail() {
        if (empty($this->email)) {
            $this->emailError = "Email field cannot be empty!";
        } else {
            $this->email = $this->testInput($this->email);
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->emailError = "Invalid email format!";
            }
        }

        return $this->emailError;
    }

    public function checkFullname() {
        if (empty($this->fullname)) {
            $this->fullnameError = "Name field cannot be empty!";
        }

        return $this->fullnameError;
    }
}