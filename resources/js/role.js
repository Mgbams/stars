/**************   Create Modal   *******************/

let modalBtn = document.getElementById("create_record");

let modal = document.querySelector(".create-modal");

let closeBtn = document.querySelector(".close-btn");

modalBtn.onclick = function() {
    modal.style.display = "block";
};

closeBtn.onclick = function() {
    modal.style.display = "none";
};

window.onclick = function(e) {
    if (e.target == modal) {
        modal.style.display = "none";
    }
};

/****   Delete Modal  ******/

document.querySelectorAll(".deleteById").forEach(button => {
    button.addEventListener("click", () => {
        const starTabsNumber = button.dataset.forTab;

        const tabsToShow = document.querySelector(
            `.delete-modal[data-tab="${starTabsNumber}"]`
        );

        tabsToShow.style.display = "block";

        //Obtenez le chemin relatif de close bouton vers tabsToShow à partir de la console
        let deleteCloseButton =
            tabsToShow.childNodes[1].childNodes[1].childNodes[1];

        //Obtenez le chemin relatif de No bouton vers tabsToShow à partir de la console
        let noButton =
            tabsToShow.childNodes[1].lastElementChild.childNodes[1][2];

        deleteCloseButton.addEventListener("click", () => {
            tabsToShow.style.display = "none";
        });

        noButton.addEventListener("click", () => {
            tabsToShow.style.display = "none";
        });

        window.onclick = function(e) {
            if (e.target == tabsToShow) {
                tabsToShow.style.display = "none";
            }
        };
    });
});
