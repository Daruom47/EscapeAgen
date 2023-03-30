<div class="slide">
    <div class="scenario">
        <div class="content">
            <div class="scenario-title">
                <p> <?= $resultat["nom"] ?> </p>
            </div>
            <a href="./scenario-<?= $resultat["id"] ?>">
            <div class="content-overlay"></div>
                <img class="content-image" src="
                  <?= $resultat["image"] ?>" alt="
                  <?= $resultat["nom"] ?>">
              <div class="content-details fadeIn-bottom">
                <p class="content-text"> <?= $resultat["short_resume"] ?> </p>
                <hr class="separator">
                <div class="scenario-details flex">
                  <div class="flex">
                     <span class="badge info"> <?= DIFFICULTY[$resultat["difficulty"]] ?> </span>
                 </div>
                  <div class="flex">
                    <span class="badge info"> <?= $resultat["min_players"] ?>à <?= $resultat["max_players"] ?> joueurs </span>
                 </div>
                  <div class="flex">
                    <span class="badge info"> <?= $resultat["time_mins"] ?> mins </span>
                  </div>
                </div>
              </div>
            </a>
      </div>
    </div>
</div>