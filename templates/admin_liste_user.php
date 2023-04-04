
<table class="adminUserList">
  <thead>
    <tr>
      <th>NOM</th>
      <th>Prénom</th>
      <th>Adresse</th>
      <th>Téléphone</th>
      <th>Email</th>
      <th>Rôle</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($users as $u) { ?>
      <tr data-id="<?= $u['id'] ?>">
          <td><?= $u['nom'] ?></td>
          <td><?= $u['prenom'] ?></td>
          <td><?= $u['adresse'] ?></td>
          <td><?= $u['telephone'] ?></td>
          <td><?= $u['mail'] ?></td>
          <td><?= $u['role'] ?></td>
          <td>
              <button class="btnModifier">Modifier</button>
              <button class="btnSupprimer">Supprimer</button>
          </td>
      </tr>
  <?php } ?>
  </tbody>
</table>

