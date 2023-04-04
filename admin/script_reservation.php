<?php
require_once   "../includes/config.php";
require_once   "../includes/fonctions.php";
require_once   "../class/Reservation.php";

$reservations = new Reservation();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
$tab = [
    'id_scenario' => $_POST['id_scenario'],
    'nom' => $_POST['nom'],
    'mail' => $_POST['mail'],
    'telephone' => $_POST['telephone'],
    'nombre_adulte' => $_POST['nombre_adulte'],
    'nombre_enfant' => $_POST['nombre_enfant'],
    'jour' => $_POST['jour'],
    'heure' => $_POST['heure'],
    'information' => $_POST['information']

];

$reservations->updateReservation($tab, $id);

$response = array("success" => true, "message" => "Réservation mise à jour avec succès !");


  // if ($reservations->updateReservation($tab, $id)) {
  //   // Si la mise à jour a réussi, renvoyer une réponse JSON avec un indicateur de succès
  //   $response = array("success" => true, "message" => "Réservation mise à jour avec succès !");
  //   // echo json_encode(array('success' => true));
  // } else {
  //   // Sinon, renvoyer une réponse JSON avec un indicateur d'erreur
  //   $response = array("success" => false, "message" => "Erreur lors de la mise à jour de la réservation : " );
  // }

  header('Content-type: application/json');
  echo json_encode($response);
}