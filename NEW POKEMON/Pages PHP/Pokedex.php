<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pokemon GO/INFO</title>
    <link rel="stylesheet" type="text/css" href="../Pages%20CSS/PokedexStyle.css">
    <link rel="stylesheet" type="text/css" href="../Pages%20CSS/modal_boxes.css">
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
                <li><a href="../Pages%20HTML/Info.html" id="info">Home</a></li>
                <li><a href="Chat.php" id="chat" style="display: none;">Chat</a></li>
                <li><a href="Quiz.php" id="quiz" style="display: none;">Quiz</a></li>
                <li><a href="TheDangers.php" id="dangers" style="display: none;">The dangers..</a></li>
                <li><a href="../Pages%20HTML/Explore.html" id="explore" style="display: none;">Explore</a></li>
                <li><a href="Pokedex.php" id="pokedex" class="current" style="display: none;">Pokedex</a></li>
                <li><a href="../Pages%20HTML/TeamsAndGyms.html" id="teams" style="display: none;">Teams and gyms</a></li>
                <li><a href="#" id="login" class="open_modal">Login</a></li>
                <li><a href="#" id="logout" style="display: none;">Logout</a></li>
                <li><a href="#" id="register" class="open_modal">Register</a></li>
            </ul>

            <ul>
                <li style="float: right;" id="logged_as"></li>
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
                    <form method="post" id="login_form">
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

        <?php
        require_once('simple_html_dom.php');
        require_once('Database.php');

        define("HOSTNANE", "localhost");
        define("USERNAME", "root");
        define("PASSWORD", "");
        define("DATABASE", "teamwork");

        define ("TYPE_PATTERN", "/[\\w]+/");
        define ("ATTACK_PATTERN", "/[\\w ]+/");

        $siteContent = file_get_html("https://fevgames.net/pokedex/");
        $names = [];
        $numbers = [];

        foreach ($siteContent->find('a[class=pokedex-item]') as $a) {
            $plaintext = $a->plaintext;
            $numbers[] = substr($plaintext, 0, 6);
            $names[] = substr($plaintext, 7);
        }

        if (!isset($_GET['name']) && !isset($_GET['number'])) {
            echo "<table width='1000px' id='pokedexTable'>";
            echo "<tr>";

            for ($i = 1; $i < 134; $i++) {
                if ($i >= 0 && $i <= 9) {
                    $target = "00" . $i;
                } else if ($i >= 10 && $i <= 99) {
                    $target = "0" . $i;
                } else {
                    $target = $i;
                }

                if ($i % 4 == 1 && $i != 1) {
                    echo "<tr>";
                }

                echo "<td>";
                echo "<a href='" . "?name=" . strtolower($names[$i - 1]) . "&number=" . $target . "'>";
                //echo "<figure>";
                echo "<div class='thumbnail'>";
                echo "<div class='image'>";
                echo "<img src=http://assets.pokemon.com/assets/cms2/img/pokedex/detail/" . $target . ".png/>";
                echo "</div>";
                echo "</div>";
                //echo "</figure>";
                echo "</a>";
                echo "<figcaption>" . $numbers[$i - 1] . "</figcaption>";
                echo "<figcaption>" . $names[$i - 1] . "</figcaption>";
                echo "</td>";

                if ($i % 4 == 0) {
                    echo "</tr>";
                }
            }

            echo "</table>";
        } else {
            $name = $_GET['name'];

            if ($name == "farfetch") {
                $name = "farfetchd";
                $number = "083";
            } else if ($name == "mr.mime") {
                $name = "mr-mime";
                $number = $_GET['number'];
            } else if ($name == "nidoran ♀" || $name == "nidoran ♂") {
                $name = "nidoran";
                $number = $_GET['number'];
            } else {
                $number = $_GET['number'];
                $number = $_GET['number'];
            }

            $url = "https://fevgames.net/pokedex/" . $number . "-" . $name . "/";
            $plaintext = [];
            $headers = [];

            $specific_pokemon = file_get_html($url);

            $first_table = $specific_pokemon->find('table', 0);

            foreach ($first_table->find('tr td strong') as $element) {
                $headers[] = $element->plaintext;
            }

            foreach ($first_table->find('tr td') as $element) {
                $plaintext[] = $element->plaintext;
            }


            echo "<br>";

            array_pop($plaintext);
            array_pop($plaintext);
            array_pop($plaintext);
            array_pop($headers);

            array_splice($plaintext, 13, 1);
            array_splice($plaintext, 16, 1);

            $orderedData = array();

            for ($i = 0; $i < count($headers) - 1; $i++) {
                while ($plaintext[0] != $headers[$i + 1] && $i + 1 < count($headers)) {

                    if ($plaintext[0] == $headers[$i]) {
                        array_shift($plaintext);
                        continue;
                    }

                    switch ($headers[$i]) {
                        case "Name":
                        case "Classification":
                        case "Avg Weight":
                        case "About":
                        case "Avg Height":
                        case "Flee Rate":
                        case "Base Stamina":
                        case "Base Attack":
                        case "Base Defense":
                        case "Base Flee Rate":
                        case "Next Evolution Requirements":
                        case "Next evolution(s)":
                        case "Common Capture Area":
                        case "Previous evolution(s)":
                            $orderedData[$headers[$i]] = $plaintext[0];
                            break;
                        /*case "Previous evolution(s)":
                            $array = array();
                            $array[] = $plaintext[0];
                            $orderedData[$headers[$i]] = $array;
                            break;*/
                        case "Type(s)":
                        case "Resistant To (0.8x)":
                        case "Weak To (1.25x)":
                            $array = splitTypes($plaintext[0]);
                            $orderedData[$headers[$i]] = $array;
                            break;
                        case "Fast Attack(s)":
                        case "Special Attack(s)":
                            if (isset($orderedData[$headers[$i]])) {
                                $oldArray = $orderedData[$headers[$i]];
                            } else {
                                $oldArray = array();
                            }

                            $array = splitAttacks($plaintext[0], $oldArray);
                            $orderedData[$headers[$i]] = $array;
                            break;
                    }

                    array_shift($plaintext);
                }
            }


            $array = splitTypes($plaintext[count($plaintext) - 1]);
            $orderedData[$headers[count($headers) - 1]] = $array;


            echo "<br>";

            drawData($orderedData, $headers, $name, $number);
        }

        function splitTypes($data) {
            $finalArray = array();

            preg_match_all(TYPE_PATTERN, $data, $array);
            foreach ($array[0] as $item) {
                if ($item == "nbsp") continue;

                $finalArray[] = $item;
            }

            return $finalArray;
        }

        function splitAttacks($data, $oldArray) {
            preg_match_all(ATTACK_PATTERN, $data, $array);

            foreach ($array[0] as $item) {
                if ($item == "nbsp") continue;

                $oldArray[] = trim($item);
            }

            array_pop($oldArray);
            return $oldArray;
        }

        function drawData($orderedData, $headers, $name, $number) {

            echo "<div id='wrapper'>";

                echo "<div id='header'>";

                    echo "<h1>" . ucwords($name) . "</h1>";

                echo "</div>";

                echo "<div id='portrait'>";

                    echo "<img id='pokemonPic' src='http://assets.pokemon.com/assets/cms2/img/pokedex/detail/" . $number . ".png'/>";

                echo "</div>";

                echo "<table id='singlePokemonTable' width='500px' border='15px' style='margin-top: 70px; margin-left: 580px; border-bottom-style: ridge; border-color: #0000FF #99ccff	 #4da6ff '>";

                    foreach ($headers as $header) {
                        echo "<tr>";

                            $item = $orderedData[$header];

                            echo "<td>";

                                echo $header;

                            echo "</td>";


                            if (!is_array($item)) {
                                echo "<td>";

                                    echo $item;

                                echo "</td>";
                            } else {
                                echo "<td>";

                                if ($header == "Fast Attack(s)" || $header == "Special Attack(s)") {
                                    $count = 0;

                                    for ($i = 0; $i < count($item); $i += 3) {
                                        if ($count == 3) break;

                                        echo "<span id='attack'>" . $item[$i] . "</span>";
                                        echo " (<span id='" . strtolower($item[$i + 1]) . "'>" . $item[$i + 1] . "</span> ";
                                        echo " - " . $item[$i + 2] . ")";
                                        echo "<br>";

                                        $count++;
                                    }
                                } else if ($header == "Next evolution(s)" || $header == "Previous evolution(s)") {
                                    foreach ($item as $singleItem) {
                                        $db = new Database(HOSTNANE, USERNAME, PASSWORD, DATABASE);
                                        $queryString = "SELECT link from pokemon_pictures WHERE name = ?";
                                        $query = $db->query($queryString);
                                        $query->bind_param("s", $singleItem);
                                        $query->execute();

                                        $query->bind_result($link);

                                        while ($query->fetch()) {
                                            echo "<figure>";
                                            echo "<img src='" . $link . "'/>";
                                            echo "<figcaption>" . ucwords($singleItem) . "</figcaption>";
                                            echo "</figure>";
                                        }
                                    }
                                } else {
                                    foreach ($item as $singleItem) {
                                        echo "<span id='" . strtolower($singleItem) . "'>" . $singleItem . "</span> ";
                                    }
                                }

                                echo "</td>";
                            }

                        echo "</tr>";
                    }

                echo "</table>";

            echo "</div";
        }
        ?>

    </div>
</div>

<script>
    $("tr")
</script>

<script src="../script/modal_boxes.js"></script>
<script src="../script/register_validation.js"></script>
<script src="../script/login.js"></script>
<script src="../script/is_logged_in.js"></script>
<script src="../script/logout.js"></script>
</body>
</html>
