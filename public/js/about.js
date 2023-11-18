function myFunction(mediaScreen) {
    if (mediaScreen.matches) { // If media query matches
        document.getElementsByClassName('td-img')[0].rowSpan = 1;
    } else {
        document.getElementsByClassName('td-img')[0].rowSpan = 4;
    }
}

var mediaScreen = window.matchMedia("(max-width: 1199px)")
myFunction(mediaScreen) // Call listener function at run time
mediaScreen.addListener(myFunction) // Attach listener function on state changes