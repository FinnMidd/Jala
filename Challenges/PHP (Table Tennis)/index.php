<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
    //* Backend Table Tennis Code
    function getPlayerName($id, $players_array) {
        foreach ($players_array as $player) {
            if ($id == $player['id']) {
                return $player['firstName'] . " " . $player['lastName'];
            }
        }
    }

    function getPlayerGames($id) {
        // Define variables & arrays
        $filename = "snippet_data.json";
        $json_data = file_get_contents($filename);
        $decode_data = json_decode($json_data, true);
        $players_array = $decode_data["players"];
        $games_array = $decode_data["games"];
        $player_games = [];

        // Check ID is valid & update status
        foreach ($players_array as $player) {
            if ($id == $player['id']) {
                $valid_status = true;
                break;
            } else {
                $valid_status = false;
            }
        }

        // Check status
        if ($valid_status == false) {
            echo "<p>ID not found</p>";
        } else {
            echo "<h4>Player #$id (" . getPlayerName($id, $players_array) . ") found.</h4>";
            // Loop through games array
            foreach ($games_array as $game) {
                // Check if ID is found in any game stats
                if ($id == $game['winnerId'] || $id == $game['loserId']) {
                    // Add the game object to player_games
                    $player_games[] = $game;
                }
            }

            // If no games found
            if (empty($player_games)) {
                echo "<p>This player has no recorded games</p>";
            } else {
                // If games found
                // for each game echo stats within a div
                foreach ($player_games as $game) {
                    // Echo container & score
                    echo "<div class='game-container'>";
                    echo "<p><span style='font-weight: bold; '>Tournament Match</span></p>";
                    echo "<p>Score: " . $game['winnerScore'] . " - " . $game['loserScore'] . "</p>";

                    // Highlight player outcome
                    if ($game['winnerId'] == $id) {
                        echo "<p><span class='winner'>Winner: " . " " . getPlayerName($game['winnerId'], $players_array) . "</span></p>";
                        echo "<p>Loser: <a class='player-link' href='?id=" . $game['loserId'] . "'>" . getPlayerName($game['loserId'], $players_array) . "</a></p>";
                    } else {
                        echo "<p>Winner: <a class='player-link' href='?id=" . $game['winnerId'] . "'>" . getPlayerName($game['winnerId'], $players_array) . "</a></p>";
                        echo "<p><span class='loser'>Loser: " . getPlayerName($game['loserId'], $players_array) . "</span></p>";
                    }
                    echo "</div>";
                }
                echo "<br>";
            }
        }   
    }

    //! Test
    // Check if page is loaded via hyperlink
    if (isset($_GET['id'])) {
        // Get ID from url
        $id = $_GET['id'];
        // Run function
        getPlayerGames($id);
    } else {
        //* Manual input here
        getPlayerGames(2127);
    }

    ?>

    <footer>
        <p><a href="https://github.com/FinnMidd/Jala" class="me">&copy; Finn Middleton 2024</a></p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
