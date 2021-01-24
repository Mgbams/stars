function formMonitor(formElements) {
    //nom field error text monitoring
    document.getElementById("nom").addEventListener("input", function() {
        if (this.value === "") {
            // faire rien
        } else {
            if (
                document.getElementsByClassName("nomError") &&
                document.getElementById("name").value !== ""
            ) {
                document.getElementsByClassName("nomError")[0].style.display =
                    "none";
                document.getElementById("name").style.border =
                    "1px solid green";
                document.getElementById("name").style.color = "black";
            }
        }
    });

    //prenom field error text monitoring
    document.getElementById("email").addEventListener("input", function() {
        if (this.value === "") {
            // faire rien
        } else {
            if (
                document.getElementsByClassName("prenomError") &&
                document.getElementById("email").value !== ""
            ) {
                document.getElementsByClassName(
                    "prenomError"
                )[0].style.display = "none";
                document.getElementById("email").style.border =
                    "1px solid green";
                document.getElementById("email").style.color = "black";
            }
        }
    });

    // surveillance du texte d'erreur du champ roles
    document.getElementById("roles").addEventListener("change", function() {
        if (this.value === "") {
            // faire rien
        } else {
            if (
                document.getElementsByClassName("prenomError") &&
                document.getElementById("roles").value !== ""
            ) {
                document.getElementsByClassName(
                    "prenomError"
                )[0].style.display = "none";
                document.getElementById("roles").style.border =
                    "1px solid green";
                document.getElementById("roles").style.color = "black";
            }
        }
    });

    //image field error text monitoring
    document.getElementById("image").addEventListener("change", function() {
        if (this.value === "") {
            // faire rien
        } else {
            if (
                document.getElementsByClassName("fileError") &&
                document.getElementById("image").value !== ""
            ) {
                document.getElementsByClassName("fileError")[0].style.display =
                    "none";
                document.getElementById("image").style.border =
                    "1px solid green";
                document.getElementById("image").style.color = "black";
            }
        }
    });
}

formMonitor(document.getElementById("form-container")); // invoke the function
