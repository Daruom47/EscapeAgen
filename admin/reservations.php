<?php
require_once "../includes/config.php";
require_once "../includes/fonctions.php";
require_once "../class/scenario.class.php";
require_once "../class/Reservation.php";
require_once '../templates/admin_head.php';
require_once '../templates/admin_nav.php'; 
$reservations = new Reservation();
$scenario = new Scenario;
if (isset($_POST['sup'])) {
    $reservations->delete($_POST['sup']);
}
?>

<div class="adminMsg">
    <h1 class="textAnimation">ADMINISTRATION</h1>
    <h2>RESERVATION</h2>

<table class="adminScenarioList">
  <thead>
    <tr>
      <th colspan="1">Scénario</th>
      <th colspan="1">NOM</th>
      <th colspan="1">Mail</th>
      <th colspan="1">Téléphone</th>
      <th colspan="1">Nombre d'adultes</th>
      <th colspan="1">Nombre d'enfants</th>
      <th colspan="1">Jour</th>
      <th colspan="1">Heure</th>
      <th colspan="1">Information</th>
      <th colspan="1">Gestion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($reservations->getReservations() as $r) : 
        $scenar =  $scenario->get($r['id_scenario']);  ?>
      <tr>
        <td><?= htmlspecialchars($scenar['nom']) ?></td>
        <td><?= htmlspecialchars($r['nom']) ?></td>
        <td><?= htmlspecialchars($r['mail']) ?></td>
        <td><?= htmlspecialchars($r['telephone']) ?></td>
        <td><?= htmlspecialchars($r['nombre_adulte']) ?></td>
        <td><?= htmlspecialchars($r['nombre_enfant']) ?></td>
        <td><?= htmlspecialchars($r['jour']) ?></td>
        <td><?= htmlspecialchars($r['heure']) ?></td>
        <td><?= htmlspecialchars($r['information']) ?></td>
        <td><form action="#" method="post">
            <button class="btnModifier" data-target="#modal" data-toggle="modal" data-bs-id="<?= $r['id'] ?>">Modifier</button>
            <button class="btnSupprimer" data-target="#modal2" data-toggle="modal" data-bs-id="<?= $r['id'] ?>">Supprimer</button>
            <!-- <button type="submit" name="sup" value="<?= $r['id'] ?>" class="btnSupprimer">Supprimer</button></td> -->
        </form>
      </tr>
      <?php endforeach; ?>
    </tbody>
</table>


    
<!-- Modale Modif -->
<div class="modal" id="modal" role="dialog">
    <div class="modal-content">
        <div class="modal-close" data-dismiss="dialog">X</div>
        <div class="modal-header">
            <p>Modification de la réservation</p>
        </div>
        <div class="modal-body">
            <form action="" id="form-modifier-reservation">
                <div>
                    <input type="hidden" name="id" class="form-control" id="id"  placeholder="">
                </div>
                <div>
                    <label for="nom" class="form-label">Scénario</label>
                    <select class="textarea1" name="id_scenario" required>

                        <option selected value="0">Scénarios</option>

                        <?php

                        $s = new Scenario();

                        $vallue = 0;

                        foreach ($s->getList(true) as $resultat){

                            $vallue++;

                            echo '<option value="' .$resultat["id"]. '">' .$resultat["nom"]. '</option>';

                        }

                        ?>

                    </select>                
                </div>
                <div>
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="" required>
                </div>
                <div>
                    <label for="mail" class="form-label">E-mail</label>
                    <input type="mail" name="mail" class="form-control" id="mail" placeholder="" required>
                </div>
                <div>
                    <label for="telephone" class="form-label">telephone</label>
                    <input type="text" name="telephone" class="form-control" id="telephone" placeholder="" required>
                </div>
                <div>
                    <label for="nombre_adulte" class="form-label">nombre_adulte</label>
                    <input type="text" name="nombre_adulte" class="form-control" id="nombre_adulte" placeholder="" required>
                </div>
                <div>
                    <label for="nombre_enfant" class="form-label">nombre_enfant</label>
                    <input type="text" name="nombre_enfant" class="form-control" id="nombre_enfant" placeholder="" required>
                </div>
                <div>
                    <label for="jour" class="form-label">jour</label>
                    <input type="date" name="jour" class="form-control" id="jour" placeholder="" required>
                </div>
                <div>
                    <label for="heure" class="form-label">heure</label>
                    <input type="time" name="heure" class="form-control" id="heure" placeholder="" required>
                </div>
                <div>
                    <label for="information" class="form-label">information</label>
                    <input type="text" name="information" class="form-control" id="information" placeholder="" required>
                </div>

                <!-- <button type="submit" class="btn">Enregistrer</button> -->
            
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-close" role="button" data-dismiss="dialog">Fermer</a>
            <a href="#" ><button type="submit" class="btn">Enregistrer</button></a>
        </div>
        </form>
    </div>
</div>


<!-- Modale Sup -->
<div class="modal" id="modal2" role="dialog">
    <div class="modal-content">
        <div class="modal-close" data-dismiss="dialog">X</div>
        <div class="modal-header">
            <p>Confirmation de suppression</p>
        </div>
        <div class="modal-footer">
            <form action="#" method="post">
                <button class="btn btn-close" role="button" data-dismiss="dialog">Fermer</button>
                <button class="btn"  type="submit" name="sup" id='sup' class="btnSupprimer">Supprimer</button></td>
            </form>
        </div>
    </div>
</div>

<script>

window.onload = () => {
    // On récupère tous les boutons d'ouverture de modale
    const modalButtons = document.querySelectorAll("[data-toggle=modal]");
    
    for(let button of modalButtons){
        button.addEventListener("click", function(e){
            // On empêche la navigation
            e.preventDefault();
            // On récupère le data-target
            let target = this.dataset.target
            
            const id = button.getAttribute('data-bs-id');
            document.getElementById('id').value = id;
            document.getElementById('sup').value = id;

            // On récupère la bonne modale
            let modal = document.querySelector(target);
            
            // On affiche la modale
            modal.classList.add("show");

            // On récupère les boutons de fermeture
            const modalClose = modal.querySelectorAll("[data-dismiss=dialog]");
            
            for(let close of modalClose){
                close.addEventListener("click", () => {
                    modal.classList.remove("show");
                });
            }

            // On gère la fermeture lors du clic sur la zone grise
            modal.addEventListener("click", function(){
                this.classList.remove("show");
            });
            // On évite la propagation du clic d'un enfant à son parent
            modal.children[0].addEventListener("click", function(e){
                e.stopPropagation();
            })
        });
    }

    document.getElementById('form-modifier-reservation').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Récupérer les données du formulaire
      const formData = new FormData(this);
      
      const id = formData.get('id');
      
      // Envoyer une requête Ajax pour mettre à jour la réservation
      fetch('script_reservation.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        // Si la mise à jour a réussi, fermer la modale et recharger la page
        if (data.success) {
          document.getElementById('modal').classList.remove('show');
          location.reload();
        } else {
          // Sinon, afficher une erreur
          alert('Une erreur est survenue lors de la modification de la réservation.');
        }
      })
      .catch(error => {
        console.error(error);
        alert('Une erreur est survenue lors de la modification de la réservation.');
      });
    });
    
} 

</script>

