function formMonitor(formElements) {
    //nom field error text monitoring
    document.getElementById("nom").addEventListener("input", function() {
        if (this.value === "") {
            // faire rien
        } else {
            if (
                document.getElementsByClassName("nomError") &&
                document.getElementById("nom").value !== ""
            ) {
                document.getElementsByClassName("nomError")[0].style.display =
                    "none";
                document.getElementById("nom").style.border = "1px solid green";
                document.getElementById("nom").style.color = "black";
            }
        }
    });

    //prenom field error text monitoring
    document.getElementById("prenom").addEventListener("input", function() {
        if (this.value === "") {
            // faire rien
        } else {
            if (
                document.getElementsByClassName("prenomError") &&
                document.getElementById("prenom").value !== ""
            ) {
                document.getElementsByClassName(
                    "prenomError"
                )[0].style.display = "none";
                document.getElementById("prenom").style.border =
                    "1px solid green";
                document.getElementById("prenom").style.color = "black";
            }
        }
    });

    //Description field error text monitoring
    document
        .getElementById("description")
        .addEventListener("input", function() {
            if (this.value === "") {
                // faire rien
            } else {
                if (
                    document.getElementsByClassName("descriptionError") &&
                    document.getElementById("description").value !== ""
                ) {
                    document.getElementsByClassName(
                        "descriptionError"
                    )[0].style.display = "none";
                    document.getElementById("description").style.border =
                        "1px solid green";
                    document.getElementById("description").style.color =
                        "black";
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
