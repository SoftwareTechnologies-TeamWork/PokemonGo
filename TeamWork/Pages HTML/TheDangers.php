<?php
session_start();
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pokemon GO/INFO</title>
    <link rel="stylesheet" type="text/css" href="../Pages CSS/TheDangersStyle.css">
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
                <li><a href="Chat.php">Forum</a></li>
                <li><a href="Quiz.php">Quiz</a></li>
                <li><a href="TheDangers.php" class="current">The dangers..</a></li>
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

        <div class="dangers">
            <div class="dangers_header">
                <h1 id="header">The Worst Real World Dangers of Playing Pokémon GO</h1>
            </div>

            <div class="dangers_body">
                <p id="body">
                    Pokémon is a game which teaches friendship, hard work, and respect for others. So as Pokémon GO mania sweeps the planet, players can be forgiven by thinking that the new mobile game will be nothing but a bit of fun. If anything, the chance to play games outside must be healthy, promoting exercise in the fresh air, right?

                    Be warned, though: while the hugely popular Pokémon GO is a lot of fun and has its benefits, there are plenty of things that can go wrong while playing. Since the game’s launch last week, stories have been flooding in of unfortunate players who’ve ended up in awkward or even downright dangerous situations as they’ve played – everything from sprained ankles to muggings have become commonplace as so many unprepared players take to the streets in search of their favorite pocket monsters.

                    So be warned: danger could befall you on your quest to be the very best, like no one ever was. Here are 15 Potential Dangers Awaiting You – read up, and stay safe.
                </p>
            </div>

            <?php
            if (!isset($_SESSION['currentDanger'])) {
                $_SESSION['currentDanger'] = 0;
            }
            ?>

            <div class="dangers_footer">
                <input type="text" id="currentDanger" value="0">

                <h1 id="new_header"></h1>
                <img id="new_image" src=""/>
                <div id="new_body"></div>

                <form id="dangers_form">
                    <input type="submit" id="previous" value="Previous" style="display: none;"/>
                    <input type="submit" id="next" value="Next"/>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="../script/modal_boxes.js"></script>
    <script src="../script/register_validation.js"></script>
    <script src="../script/the_dangers.js"></script>
</body>
</html>
