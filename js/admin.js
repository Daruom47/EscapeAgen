$(document).ready(function () {
  $(document).on("click", ".btnModifier", function () {
    var id = $(this).closest("tr").data("id");
    $.ajax({
      url: "ajax.php?action=get_scenario",
      type: "POST",
      data: { id: id },
      dataType: "json",
      success: function (response) {
        $("#add-scenario-modal h2.modal-title").text("Modifier le scénario");
        $("#add-scenario-modal button[type=submit]").text("Modifier");
        $("#add-scenario-modal input[name=action]").val("edit");
        $("#add-scenario-modal input[name=id]").val(response.id);
        $("#add-scenario-modal input[name=nom]").val(response.nom);
        $("#add-scenario-modal .thumb").html(
          '<img src=".' + response.image + '">'
        );
        $("#add-scenario-modal input[name=short_resume]").val(
          response.short_resume
        );
        $("#add-scenario-modal textarea[name=resume_complet]").val(
          response.resume_complet
        );
        $("#add-scenario-modal select[name=difficulty]").val(
          response.difficulty
        );
        $("#add-scenario-modal select[name=min_players]").val(
          response.min_players
        );
        $("#add-scenario-modal select[name=max_players]").val(
          response.max_players
        );
        $("#add-scenario-modal select[name=time_mins]").val(response.time_mins);
        $("#add-scenario-modal select[name=display]").val(response.display);
        
        $("#image").removeAttr("required");

        $("#add-scenario-modal").fadeIn();
      },
      error: function (xhr, status, error) {
        alert("Une erreur est survenue lors de la récupération du scénario.");
      },
    });
  });

  $(".add-scenario-form").submit(function (e) {
    e.preventDefault();
  
        var formData = new FormData(this);
  
        var action = $("#add-scenario-modal input[name=action]").val();
  
        var image = $("#image")[0].files[0];
    if (typeof image !== 'undefined' && image.size > 0) {
        formData.append("image", image);
    }
  
        $.ajax({
      url: "ajax.php?action=" + (action == "add" ? "add_scenario" : "update_scenario"),
      type: "POST",
      data: formData,
      dataType: "json",
      contentType: false,
      processData: false,
      success: function (data) {
                console.log(data);
        alert(data.message);
      },
      error: function (xhr, textStatus, errorThrown) {
                console.error(xhr.responseText);
      },
    });
  });
  

  $(".adminScenarioList").on("click", ".btnSupprimer", function () {
        var id = $(this).closest("tr").data("id");

        if (confirm("Êtes-vous sûr de vouloir supprimer ce scénario ?")) {
            $.ajax({
        type: "POST",
        url: "ajax.php?action=delete_scenario",
        data: {
          action: "delete",
          id: id,
        },
        success: function (response) {
                    alert(response.message);

          location.reload();
        },
        error: function (xhr, status, error) {
                    alert("Erreur : " + xhr.responseText);
        },
      });
    }
  });

  $("#image").change(function () {
    let input = this;
    if (input.files && input.files[0]) {
      let reader = new FileReader();
      reader.onload = function (e) {
        $(".thumb").html('<img src="' + e.target.result + '">');
      };
      reader.readAsDataURL(input.files[0]);
    }
  });
  $(".btnAjouter").click(function () {
    $("#add-scenario-modal h2.modal-title").text("Ajouter un scénario");
    $("#add-scenario-modal input[name=nom]").val('');
    $("#add-scenario-modal .thumb").html('');
    $("#add-scenario-modal input[name=short_resume]").val('');
    $("#add-scenario-modal textarea[name=resume_complet]").val('');
    $("#add-scenario-modal select[name=difficulty]").val('');
    $("#add-scenario-modal select[name=min_players]").val('');
    $("#add-scenario-modal select[name=max_players]").val('');
    $("#add-scenario-modal select[name=time_mins]").val('');
    $("#add-scenario-modal select[name=display]").val('');
    $("#add-scenario-modal button[type=submit]").text("Ajouter");
    $("#image").attr("required", false);
    $("#add-scenario-modal input[name=action]").val("add");
    
    $("#add-scenario-modal").show();
  });


  $(".close").on("click", function () {
    $("#add-scenario-modal").hide();
  });
});
