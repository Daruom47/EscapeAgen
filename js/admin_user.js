$(document).ready(function () {
    $(document).on("click", ".btnModifier", function () {
        var id = $(this).closest("tr").data("id");
        $.ajax({
            url: "ajax_user.php",
            type: "POST",
            data: {
                action : 'get_user',
                id: id
            },
            dataType: "json",
            success: function (response) {
                let user = {}
                user.id = response.id;
                user.nom = response.nom;
                user.prenom = response.prenom;
                user.adresse = response.adresse;
                user.telephone = response.telephone;
                user.mail = response.mail;
                user.role = response.role;
                $("#add-user-modal h2.modal-title").text("Modifier l'utilisateur");
                $("#add-user-modal button[type=submit]").text("Modifier");
                $("#add-user-modal input[name=action]").val("edit");
                $("#add-user-modal input[name=id]").val(user.id);
                $("#add-user-modal input[name=nom]").val(user.nom);
                $("#add-user-modal input[name=prenom]").val(user.prenom);
                $("#add-user-modal input[name=adresse]").val(user.adresse);
                $("#add-user-modal input[name=telephone]").val(user.telephone);
                $("#add-user-modal input[name=mail]").val(user.mail);
                $("#add-user-modal input[name=role]").val(user.role);
                $("#add-user-modal").fadeIn();
            },
            error: function (xhr, status, error) {

                console.log(error)
                alert("Une erreur est survenue lors de la récupération de l'utilisateur.");
            }
        });
    });

    $(".add-user-form").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("action", "update_user");

        console.log(formData)
        $.ajax({
            type: "POST",
            url: "ajax_user.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response.message);
                location.reload();
            },
            error: function (xhr, status, error) {
                alert("Erreur : " + xhr.responseText);
            }
        });
    });


    $(".adminUserList").on("click", ".btnSupprimer", function () {
        var id = $(this).closest("tr").data("id");

        if (confirm("Êtes-vous sûr de vouloir supprimer ce user ?")) {
            $.ajax({
                type: "POST",
                url: "ajax_user.php?action=delete_user",
                data: {
                    action: "delete_user",
                    id: id
                },
                success: function (response) {
                    alert(response.message);

                    location.reload();
                },
                error: function (xhr, status, error) {
                    alert("Erreur : " + xhr.responseText);
                }
            });
        }
    });

    $(".close").on("click", function () {
        $("#add-user-modal").hide();
    });
});
