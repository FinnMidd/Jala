document.addEventListener("DOMContentLoaded", function() {
    // Define class & delay variables
    var containers = document.querySelectorAll(".animate-fade");
    var delay = 0.1;

    // Set animation delay for game containers
    containers.forEach(function(container) {
        container.style.animationDelay = delay + "s";
        // Increase delay for the next element
        delay += 0.1;
    });

    // Reveal footer after each elements has loaded
    var footer = document.querySelector("footer");
    footer.style.animationDelay = delay + "s";
});
