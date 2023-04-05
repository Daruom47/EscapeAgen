function closeNav() {
    $("#messageFormulaire").css("width", "0%");
    $("#overlayBackground").css("width", "0%");
}

$("#formButton").on("click", function() {
    let name = $("#name").val(),
        email = $("#email").val(),
        err = [],
        message = $("#message").val();

    if (name.length < 3) {
        err.push("Votre nom doit contenir au moins 3 caractères");
    }

    if (email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) == null) {
        err.push("Votre adresse email n'est pas valide");
    }

    if (message.length <= 20) {
        err.push("Votre message doit contenir au moins 20 charactères");
    }

    if (err.length) {
        alert(err.join("\n"));
    } else {
        console.log(name, email, message);
        // Poster sur ./includes/mail.php avec jquery
            $.ajax({
            type: "POST",
            url: "./includes/mail.php",
            data: {
                 name: name, 
                 email: email, 
                 message: message
                } // replace with your desired data
            }).done(function( msg ) {
                if (parseInt(msg) == 1) {
                    alert("Votre message a bien été envoyé");
                }
                else
                    alert("Une erreur s'est produite");
            });


        // $("#overlayBackground").css("width", "100%");
        // $("#messageFormulaire").css("width", "100%");
        // ["name", "email", "message"].forEach(function(e) {
        //     $("#" + e).val("");
        // });
    }
});
