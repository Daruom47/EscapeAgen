
function closeNav() {
    document.getElementById("messageFormulaire").style.width = "0%";
    document.getElementById("overlayBackground").style.width = "0%";
  }




  
document.getElementById("formButton").addEventListener("click", function(){
    let name = document.querySelector('#name').value,
        email = document.querySelector('#email').value,
        err = Array(),
        message = document.querySelector('#message').value;

        if (name.length < 3)
            err.push("Votre nom doit contenir au moins 3 caractères");
        
        if (email.match( /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) == null)
          err.push("Votre adresse email n'est pas valide");
            


        if (message.length <= 20)
            err.push("Votre message doit contenir au moins 20 charactères");


        if (err.length){
            alert(err.join("\n"));
        }
        else{
            
            document.getElementById("overlayBackground").style.width = "100%";
            document.getElementById("messageFormulaire").style.width = "100%";
            // document.getElementById('formButton').disabled = true;
            ['name','email','message'].forEach(function(e){
                document.getElementById(e).value = "";
                // document.getElementById(e).disabled = true;
            });

        }
});