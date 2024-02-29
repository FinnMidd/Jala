<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script rel="preconnect" src="https://kit.fontawesome.com/e17e3207d2.js" crossorigin="anonymous"></script>
</head>
<body >
    <section id="nav" class="animate-fade test">
        <div>
            <div id="search-box" class="search-box">
                <div class="row shadow">
                    <input type="text" name="input-box" id="input-box" placeholder="Search player..." autocomplete="off">
                    <button id="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="result-box shadow test">
                    <ul class="test">
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="leader_board" class="test">
        
        <?php
        //* Backend Table Tennis Code
        //* -------------------------

        // Define variables & arrays
        $filename = "snippet_data.json";
        $json_data = file_get_contents($filename);
        $decode_data = json_decode($json_data, true);
        $players_array = $decode_data["players"];

        //  Get Img from player ID
        function idToImg($id) {
            return "img/profile_$id.png";
        }

        // Check ID is valid & update status
        foreach ($players_array as $player) {
            echo "<div class='player_row animate-fade'>";
            echo "<div class='player_img shadow'><img src=" . idToImg($player['id']) . " alt='profile picture'></div>";
            echo "<div class='player_card shadow'>";
            echo "<p data-id='".$player['id']."'><span style='font-weight: bold; '>".$player['firstName']." ".$player['lastName']."</span></p>";
            echo "<p><span class='winner test'>Wins: 100</span> | <span class='loser'>Losses: 0</span></p>";
            echo "<p class='secondary-stats'>Total points: 1,234</p>";
            echo "</div>";
            echo "</div>";
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


