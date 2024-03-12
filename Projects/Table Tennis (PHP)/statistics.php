<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Test</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script rel="preconnect" src="https://kit.fontawesome.com/e17e3207d2.js" crossorigin="anonymous"></script>
</head>
<body >

    <!-- Add h1 -->

    <section id="nav" class="animate-fade">
        <div>
            <div id="search-box" class="search-box">
                <div class="row shadow">
                    <input type="text" name="input-box" id="input-box" placeholder="Search player..." autocomplete="off">
                    <button id="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="result-box shadow">
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="leader_board">
        
        <?php
        //* Backend Table Tennis Code (Player Statistics Page)
        //* --------------------------------------------------

        //  Img Function
        function idToImg($id) {
            return "img/profile_$id.png";
        }

        //  Check GET variable
        if (!isset($_GET['id'])) {
            // Redirect to index.php if 'id' is not set
            header("Location: index.php");
            exit(); // Make sure to exit after redirection
        } else {

            // set GET variable
            $playerID = $_GET['id'];
            // set JSON variables
            $filename = "snippet_data.json";
            $json_data = file_get_contents($filename);
            $decode_data = json_decode($json_data, true);
            $players_array = $decode_data["players"];
            $player_validation = false;

            // Check player exists
            foreach ($players_array as $player) {
                if ($player['id'] == $playerID) {
                    // set player validation
                    $player_validation = true;

                    // echo player stats
                    echo "<div class='player_row animate-fade'>\n";
                    echo    "<div class='player_img shadow'><img src=" . idToImg($playerID) . " alt='profile picture'></div>\n";
                    
                    echo     "<div class='player_card shadow'>\n";
                    echo        "<div class='text-container'>\n";
                    echo            "<p data-id='".$player['id']."'>".$player['firstName']." ".$player['lastName']."</p>\n";
                    echo            "<p><span class='winner'>Wins: 100</span> <span class='loser'>Losses: 0</span></p>\n";
                    echo            "<p class='secondary-stats'>Total points: 1,234</p>\n";
                    echo        "</div>\n";
                    echo    "</div>\n";

                    echo "</div>\n";
                }
            }

            // check player valid & echo if false
            if (!$player_validation) {
                echo "<p>Player does not exist</p>";
            }
        }

        ?>

    </section>

    <footer>
        <p><a href="https://github.com/FinnMidd/Jala" class="me">&copy; Finn Middleton 2024</a></p>
    </footer>

    <script src="js/animation.js"></script>
    <script src="js/auto_complete.js"></script>
    <script src="js/icon_check.js"></script>
</body>
</html>


