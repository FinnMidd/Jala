
//* --------------------------------------------------

// Wait for the DOM content to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Select all <p> elements containing player names
    const playerNamesElements = document.querySelectorAll('.player_card p:first-child');

    // Create an array to store the player names
    let playerNames = [];
    let playerStats = [];

    // Iterate through each <p> element and extract the text content
    playerNamesElements.forEach(p => {
        // Extract the text content of the <p> element and trim any whitespace
        const playerName = p.textContent.trim(); // Extract the player name
        const playerId = p.getAttribute('data-id'); // Extract the player id
        
        // Construct an object containing both the name and id of the player
        const playerObject = {
            name: playerName,
            id: playerId
        };

        // Add the player name to the array
        playerNames.push(playerName);
        // Add the player object to the array
        playerStats.push(playerObject);
    });

    // Log the array of player names to the console
    console.log(playerNames);
    console.log(playerStats);

    let available_keywords = playerNames;
    
    const resultsBox = document.querySelector('.result-box');
    const inputBox = document.getElementById('input-box');
    const searchButton = document.getElementById('search-button');
    
    inputBox.addEventListener('focus', function() {
        updateResults();
        resultsBox.style.gridTemplateRows = '1fr';
        resultsBox.style.paddingTop = '10px';
    });

    searchButton.addEventListener('click', function() {
        if (document.activeElement !== inputBox) {
            updateResults();
            resultsBox.style.gridTemplateRows = '1fr';
            resultsBox.style.paddingTop = '10px';
            inputBox.focus()
        }

    });
    
    inputBox.addEventListener('keyup', function() {
        updateResults();
    });
    
    inputBox.addEventListener('blur', function() {
        if (event.relatedTarget !== searchButton) {
            resultsBox.style.gridTemplateRows = '0fr';
            resultsBox.style.paddingTop = '0px';
        }
    });
    
    function updateResults() {
        let input = inputBox.value.trim(); // Trim whitespace
        let result = available_keywords;

        if (input.length) {
            result = available_keywords.filter((keyword) => {
                return keyword.toLowerCase().includes(input.toLowerCase());
            });

            display(result);

            resultsBox.style.gridTemplateRows = result.length ? '1fr' : '0fr';
            resultsBox.style.paddingTop = result.length ? '10px' : '0px';
        } else {

            display(result);

            resultsBox.style.gridTemplateRows = '1fr';
            resultsBox.style.paddingTop = '10px';
        }
        console.log('update - result:');
        console.log(result);
    };
    
    function display(result) {
        console.log('display - result:');
        console.log(result);

        // Filter out only the player objects whose names are present in the playerNames array
        const filteredPlayers = playerStats.filter(player => {
            // Check if the name of the current player object exists in the result array
            return result.includes(player.name);
        });

        console.log('display - filteredPlayers:');
        console.log(filteredPlayers);

        const content = filteredPlayers.map((item) => {
            // Access the 'name' and 'id' properties from each player object
            const playerName = item.name;
            const playerId = item.id;
    
            // Build the HTML string with the player name and id wrapped in <p> tags
            return "<li data-player-id='" + playerId + "'>" +
                        "<p class='player-name'>" + playerName + "</p>" +
                        "<p class='player-id'>#" + playerId + "</p>" +
                    "</li>";
        });
    
        resultsBox.innerHTML = "<ul>" + content.join("") + "</ul>";
    };
    
    function selectInput(playerId) {
        window.location.href = 'player?id=' + playerId;
    }

    resultsBox.addEventListener('onclick', function() {
        console.log('clicked');
        selectInput(this);
    });

});
