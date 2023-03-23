<div id="add-scenario-modal" class="modal" style="display:none;">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2 class="modal-title">Ajouter un scénario</h2>

    <form class="add-scenario-form" action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="add" style="display: none;">
    <input type="hidden" id="id" name="id" value="" style="display: none;">
    <div class="form-group">
        <input type="text" id="nom" name="nom" required placeholder="Nom">
      </div>
      <div class="form-group">
      <div class="thumb"></div>
        <input type="file" id="image" name="image" accept="image/*" required>
        

      </div>
      <div class="form-group">
        <input type="text" id="short_resume" name="short_resume" required placeholder="Résumé court">
      </div>
      <div class="form-group">
        <textarea id="resume_complet" name="resume_complet" required placeholder="Résumé complet"></textarea>
      </div>
      <div class="form-group">
        <select id="difficulty" name="difficulty" required>
          <option value="">Sélectionnez la difficulté</option>
          <?php
        $options = DIFFICULTY;
        foreach ($options as $key => $value) {
          if ($value != 0)
          echo '<option value="' . $key . '">' . $value . '</option>';
        }
          ?>
        </select>
        <select id="min_players" name="min_players" required>
          <option value="">Sélectionnez le nombre de joueurs minimum</option>
          <?php
          for ($i = 1; $i <= 4; $i++) {
            echo '<option value="' . $i . '">' . $i . ' joueur(s) minimum</option>';
          }
          ?>
        </select>
        <select id="max_players" name="max_players" required>
          <option value="">Sélectionnez le nombre de joueurs maximum</option>
          <?php
          for ($i = 1; $i <= 10; $i++) {
            echo '<option value="' . $i . '">' . $i . ' joueur(s) maximum</option>';
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <select id="time_mins" name="time_mins" required>
          <option value="">Sélectionnez la durée en minutes</option>
          <option value="60">60 minutes</option>
          <option value="90">90 minutes</option>
          <option value="120">120 minutes</option>
        </select>
        <select id="display" name="display" required>
          <option value="">Sélectionnez la disponibilité</option>
          <option value="1">Disponible</option>
          <option value="0">Indisponible</option>
        </select>
      </div>
      <button type="submit">Ajouter</button>
    </form>
  </div>
</div>
