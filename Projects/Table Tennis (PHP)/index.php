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
        //* ------------------------------ *//
        //* Backend Table Tennis Challenge *//
        //* ------------------------------ *//

        // include functions file
        include 'functions.php';

        // Define variables & arrays
        $decode_data = read_json("snippet_data.json");
        $players_array = $decode_data["players"];
        $games_array = $decode_data["games"];

        $stat_page = "statistics.php";

        // Check ID is valid & update status
        foreach ($players_array as $player) {
            // define variables
            $id = $player['id'];
            $fname = $player['firstName'];
            $lname = $player['lastName'];
            $wins = $player['wins'];
            $losses = $player['losses'];


            // echo container
            echo <<<HTML

            <div class='player_row animate-fade'>
                <div class='player_img shadow'><img src="img/profile_$id.png" alt='profile picture'></div>
                <div class='player_card shadow' onclick="window.location.href='statistics.php?id=$id'">
                    <div class='text-container'>
                        <p data-id='$id'>$fname $lname</p>
                        <p><span class='winner'>Wins: 100</span> <span class='loser'>Losses: 0</span></p>
                        <p class='secondary-stats'>Total points: 1,234</p>
                    </div>
                    <aside>
                        <button><img src='img/trace.svg' alt='arrow icon' class='link-arrow'></button>
                    </aside>
                </div>
            </div>

            HTML;
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


