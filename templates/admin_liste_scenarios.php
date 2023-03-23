<table class="adminScenarioList">
  <thead>
    <tr>
      <th colspan="4"><button class="btnAjouter">+</button></th>
    </tr>
    <tr>
      <th></th>
      <th>NOM</th>
      <th>RESUME</th>
      <th>GESTION</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($scenario->getList(false) as $r) : ?>
      <tr data-id="<?= $r['id'] ?>">
        <td><img src="<?= '.' . $r['image'] ?>"></td>
        <td><?= $r['nom'] ?></td>
        <td><?= $r['short_resume'] ?></td>
        <td><button class="btnModifier">Modifier</button> <button class="btnSupprimer">Supprimer</button></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
