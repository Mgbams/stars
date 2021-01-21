function launchStarTabs() {
    document.querySelectorAll(".startabs_button").forEach(button => {
        button.addEventListener("click", () => {
            const startabsSidebar = button.parentElement;
            const starTabs = startabsSidebar.parentElement;
            const starTabsNumber = button.dataset.forTab; // get the id of each star
            // select content with data-tab = startTabsNumber.  It selects a content with corresponding data-tab number
            const tabsToShow = starTabs.querySelector(
                `.startabs_contents[data-tab="${starTabsNumber}"]`
            );

            startabsSidebar
                .querySelectorAll(".startabs_button")
                .forEach(button => {
                    //First remove the active class from all buttons on click
                    button.classList.remove("startabs_button_active");
                });

            starTabs.querySelectorAll(".startabs_contents").forEach(content => {
                //First remove the active class from all contents when a button is clicked
                content.classList.remove("startabs_contents_active");
            });

            button.classList.add("startabs_button_active"); //Re-apply active class to the clicked button

            //Re-apply active class to the corresponding content so it can be displayed
            tabsToShow.classList.add("startabs_contents_active");
        });
    });
}

// Call the launchStarTabs function
launchStarTabs();

// On page load make a click dynamically to attach .startabs_contents_active class
// and startabs_button_active class to the first element of starTabs div
document.querySelectorAll(".startabs").forEach(starTabs => {
    starTabs.querySelector(".startabs_sidebar .startabs_button").click();
});


/***
 * ==========================
 * Small scrren display code
 * ==========================
 * 
 */

 function accordionController(accordionElem) {
     //when panel is clicked, handlePanelClick is called.

     function handlePanelClick(event) {
         showPanel(event.currentTarget);
     }

     //Hide currentPanel and show new panel.

     function showPanel(panel) {
         //Hide current one. First time it will be null.
         var expandedPanel = accordionElem.querySelector(".active");
         if (expandedPanel) {
             expandedPanel.classList.remove("active");
         }

         //Show new one
         panel.classList.add("active");
     }

     var allPanelElems = accordionElem.querySelectorAll(".panel");
     for (var i = 0, len = allPanelElems.length; i < len; i++) {
         allPanelElems[i].addEventListener("click", handlePanelClick);
     }

     //By Default Show first panel
     showPanel(allPanelElems[0]);
 }

 if (document.getElementById("stars-lists")) {
    // call this function when star-lists element comes into view
    accordionController(document.getElementById("stars-lists")); 
 }
