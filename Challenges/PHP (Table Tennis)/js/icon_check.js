// Check if Font Awesome resources have been loaded
function checkFontAwesomeLoaded() {
    const styleSheets = document.styleSheets;
    for (let i = 0; i < styleSheets.length; i++) {
        const styleSheet = styleSheets[i];
        if (styleSheet.href && styleSheet.href.includes('fontawesome')) {
            return true;
        }
    }
    return false;
}

// Function to change <i> tags opacity to 1
function changeITagsOpacity() {
    const iTags = document.querySelectorAll('i');
    iTags.forEach(tag => {
        tag.style.opacity = '1';
    });
}

// Check if Font Awesome resources have been loaded
if (checkFontAwesomeLoaded()) {
    // Change <i> tags opacity to 1 if Font Awesome resources are loaded
    changeITagsOpacity();
} else {
    // Listen for font awesome resources to load
    window.addEventListener('load', function () {
        // Change <i> tags opacity to 1 after Font Awesome resources are loaded
        changeITagsOpacity();
    });
}
