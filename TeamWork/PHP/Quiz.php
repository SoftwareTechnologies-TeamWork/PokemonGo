<?php
session_start();
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pokemon GO/INFO</title>
    <link rel="stylesheet" type="text/css" href="../Pages CSS/QuizStyle.css">
    <link rel="stylesheet" type="text/css" href="../style/modal_boxes.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../script/notify.js"></script>
</head>
<body>
<div id="wrapper_outer">
    <div id="wrapper_inner">

        <div id="header">

            <div id="site_title">
                <br><br><br>
                   <span style="color:#fbca04">Everything you gotta know about</span>
            </div>
        </div>
        <div id="menu">

            <ul>
                <li><a href="layout_pokemon.html">Home</a></li>
                <li><a href="Info.html">Info</a></li>
                <li><a href="Forum.html">Forum</a></li>
                <li><a href="Quiz.php" class="current">Quiz</a></li>
                <li><a href="TheDangers.html">The dangers..</a></li>
                <li><a href="Explore.html">Explore</a></li>
                <li><a href="Pokedex.php">Pokedex</a></li>
                <li><a href="TeamsAndGyms.html">Teams and gyms</a></li>
                <li><a href="#" class="open_modal">Login</a></li>
                <li><a href="#" id="clicked" class="open_modal">Register</a></li>

            </ul>
        </div>

        <!-- Login Modal -->
        <div id="login_modal" class="modal">
            <div class="modal_content">
                <div class="modal_header">
                    <span class="close">X</span>
                    <h3>Login information</h3>
                </div>

                <div class="modal_body">
                    <form method="post">
                        <label class="label" for="login_username">Username:</label>
                        <input type="text" name="login_username" id="login_username" placeholder="Username"><br>
                        <label class="label" for="login_password">Password:</label>
                        <input type="password" name="login_password" id="login_password" placeholder="Password"><br>
                        <input type="submit" value="Login">
                    </form>
                </div>
            </div>
        </div>

        <!-- Register Modal-->
        <div id="register_modal" class="modal">
            <div class="modal_content">
                <div class="modal_header">
                    <span class="close">X</span>
                    <h3>Register information</h3>
                </div>

                <div class="modal_body">
                    <form method="post" id="register_form">
                        <div class="register_menu_item">
                            <label class="label" for="register_username">Username:</label><br>
                            <input type="text" name="username" id="register_username" placeholder="Username"/>
                        </div>
                        <div class="register_menu_item">
                            <label class="label" for="register_email">Email:</label><br>
                            <input type="text" name="email" id="register_email" placeholder="Email"/>
                        </div>

                        <div class="register_menu_item">
                            <label class="label" for="register_password">Password:</label><br>
                            <input type="password" name="password" id="register_password" placeholder="Password"/>
                        </div>
                        <div class="register_menu_item">
                            <label class="label" for="register_confirm_password">Confirm Password:</label><br>
                            <input type="password" name="confirm_password" id="register_confirm_password" placeholder="Confirm password"/>
                        </div>

                        <div class="register_menu_item">
                            <label class="label" for="register_fullname">Full Name:</label><br>
                            <input type="text" name="full_name" id="register_fullname" placeholder="Full Name"/>
                        </div>
                        <div class="register_menu_item">
                            <input id="register_submit" type="submit" value="Register"><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="quiz">

        <?php
        if (!isset($_SESSION['score'])) {
            echo
            "
            <div class=\"quiz_header\">
                <h1>Can you name all these pokemons?</h1>
            </div>

            <div class=\"start_button\">
                <form>
                    <input type='submit' value='Start'/>
                </form>
            </div>
            ";

            $_SESSION['score'] = 0;
            $_SESSION['currentQuestion'] = 0;
        } else if ($_SESSION['currentQuestion'] >= 10) {
            $score = $_SESSION['score'] * 10;

            echo
            "
                <h1>Congratulations your score is $score %</h1>
            ";

            session_unset();
            session_destroy();
        } else {
            require_once('../Database.php');

            define("HOSTNANE", "localhost");
            define("USERNAME", "root");
            define("PASSWORD", "");
            define("DATABASE", "teamwork");

            echo
            "
            <div id=\"question\">
                <div id=\"question_header\">
                    <h3>Who's that pokemon</h3>
                </div>
            </div>
            ";

            $db = new Database(HOSTNANE, USERNAME, PASSWORD, DATABASE);
            $names = array();
            $image = "";
            $correctName = "";

            $pictureString = "SELECT name, link from pokemon_pictures WHERE id = ?";
            $optionsString = "SELECT name from pokemon_pictures WHERE id = ?";

            $query = $db->query($pictureString);
            $random = rand(1, 133);
            $query->bind_param("i", $random);
            $query->execute();

            $query->bind_result($name, $link);

            while ($query->fetch()) {
                $names[] = $name;
                $correctName = $name;
                $image = $link;
            }

            for ($i = 0; $i < 3; $i++) {
                $query = $db->query($optionsString);
                $random = rand(1, 133);
                $query->bind_param("i", $random);
                $query->execute();

                $query->bind_result($name);

                while ($query->fetch()) {
                    $names[] = $name;
                }
            }

            echo
                "
            <div id='question_picture'>
                <img id='picture' src='" . $image . "' alt='" . $correctName . "'/>
            </div>
            ";

            shuffle($names);

            echo
            "
            <div id = 'question_body'>
                <form id='quiz_form'>
                    <input type='radio' name='option' value='$names[0]'/>$names[0]<br>
                    <input type='radio' name='option' value='$names[1]'/>$names[1]<br>
                    <input type='radio' name='option' value='$names[2]'/>$names[2]<br>
                    <input type='radio' name='option' value='$names[3]'/>$names[3]<br>
                    <input type='submit' value='Next'/>
                </form>
                
                <input type='text' id='score' value='" . $_SESSION['score'] . "'/>
                <input type='text' id='currentQuestion' value='" . $_SESSION['currentQuestion'] . "' />
            </div>
            ";
        }
        ?>
    </div>
</div>
    <script src="../script/modal_boxes.js"></script>
    <script src="../script/register_validation.js"></script>
    <script src="../script/quiz.js"></script>
</body>
</html>
