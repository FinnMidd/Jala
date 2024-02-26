<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            echo "ID not found";
        } else {
            echo "Player #$id (" . getPlayerName($id, $players_array) . ") found.<br><br>"; //! testing purposes only
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
                echo "This player has no recorded games";
            } else {
                // If games found
                // for each game echo stats
                foreach ($player_games as $game) {
                    // Highlight player outcome
                    if ($game['winnerId'] == $id) {
                        echo "Tournament Match<br>";
                        echo "Score: " . $game['winnerScore'] . " - " . $game['loserScore'] . "<br>";
                        echo "<span style='color: limegreen; font-weight: bold;'>Winner: " . " " . getPlayerName($game['winnerId'], $players_array) . "</span><br>";
                        echo "Loser: " . getPlayerName($game['loserId'], $players_array) . "<br>";
                        echo "<br>";
                    } else {
                        echo "Tournament Match<br>";
                        echo "Score: " . $game['winnerScore'] . " - " . $game['loserScore'] . "<br>";
                        echo "Winner: " . " " . getPlayerName($game['winnerId'], $players_array) . "<br>";
                        echo "<span style='color: red; font-weight: bold;'>Loser: " . getPlayerName($game['loserId'], $players_array) . "</span><br>";
                        echo "<br>";
                    }
                }
            }
        }   
    }

    // !Test
    getPlayerGames('2130');

    // Use playerGames array to echo stats

    // getPlayerGames(christian's id 1234)

    // lookup games array, get all games containing winner & loser as 1234
    // for each game returned, log tournament match details

    ?>
</body>
</html>