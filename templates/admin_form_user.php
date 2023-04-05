<div id="add-user-modal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 class="modal-title">Modifier un utilisateur</h2>
        <form class="add-user-form" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="" style="display: none;">
            <div class="form-group">
                <input type="text" id="nom" name="nom"  placeholder="Nom">
            </div>
            <div class="form-group">
                <input type="text" id="prenom" name="prenom" required placeholder="Prénom">
            </div>
            <div class="form-group">
                <input type="text" id="adresse" name="adresse"  placeholder="Adresse">
            </div>
            <div class="form-group">
                <input type="text" id="telephone" name="telephone"  placeholder="Téléphone">
            </div>
            <div class="form-group">
                <input type="text" id="mail" name="mail" required placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" id="role" name="role" placeholder="Rôle">
            </div>

            <button type="submit">Modifier</button>

        </form>
    </div>
</div>

