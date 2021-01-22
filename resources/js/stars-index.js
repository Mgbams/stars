function launchStarTabs() {
    document.querySelectorAll(".startabs_button").forEach(button => {
        button.addEventListener("click", () => {
            const startabsSidebar = button.parentElement;
            const starTabs = startabsSidebar.parentElement;
            const starTabsNumber = button.dataset.forTab; // obtenir l'identifiant de chaque star
            // sélectionnez le contenu avec data-tab = startTabsNumber. Il sélectionne un contenu avec le numéro de l'onglet de données correspondant
            const tabsToShow = starTabs.querySelector(
                `.startabs_contents[data-tab="${starTabsNumber}"]`
            );

            startabsSidebar
                .querySelectorAll(".startabs_button")
                .forEach(button => {
                    // Supprimez d'abord la classe active de tous les boutons en cliquant
                    button.classList.remove("startabs_button_active");
                });

            starTabs.querySelectorAll(".startabs_contents").forEach(content => {
                // Supprimez d'abord la classe active de tout le contenu lorsqu'un bouton est cliqué
                content.classList.remove("startabs_contents_active");
            });

            button.classList.add("startabs_button_active"); //Réappliquez la classe active au bouton cliqué

            //Réappliquez la classe active au contenu correspondant afin qu'il puisse être affiché
            tabsToShow.classList.add("startabs_contents_active");
        });
    });
}

// Appelez la fonction launchStarTabs
launchStarTabs();

// Faites un clic dynamiquement lors du chargement de la page pour attacher la classe .startabs_contents_active
// et la classe startabs_button_active au premier élément de starTabs div
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
    // Lorsque le panneau est cliqué, handlePanelClick est appelé.

    function handlePanelClick(event) {
        showPanel(event.currentTarget);
    }

    //Masquer le panneau actuel et afficher le nouveau panneau.

    function showPanel(panel) {
        // Masquer le panneau actuel une fois cette fonction exécutée
        let expandedPanel = accordionElem.querySelector(".active");
        if (expandedPanel) {
            expandedPanel.classList.remove("active");
        }

        // Afficher le nouveau panneau correspondant au div cliqué
        panel.classList.add("active");
    }

    let allPanelElems = accordionElem.querySelectorAll(".panel");
    for (let i = 0, len = allPanelElems.length; i < len; i++) {
        allPanelElems[i].addEventListener("click", handlePanelClick);
    }

    // Afficher le premier panneau par défaut
    showPanel(allPanelElems[0]);
}

if (document.getElementById("stars-lists")) {
    // Appeler cette fonction lorsque l'élément star-lists apparaît
    accordionController(document.getElementById("stars-lists"));
}
