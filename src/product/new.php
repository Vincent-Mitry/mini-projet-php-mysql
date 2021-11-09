<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../includes/header.php';

?>

<main>
    <div class="container bg-light">
        <div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
            <div class="py-5 bg-light">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" placeholder="Nom du produit">
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        <label for="file">Fichier</label>
                        <input type="file" class="form-control-file" id="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </form> 
            </div>
        </div>
    </div>
</main>






<?php

require_once __DIR__ . '/../../includes/footer.php';