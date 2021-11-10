<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../includes/header.php';

$pdoStatement = $pdo->query('SELECT `id`, `name` FROM `category`');

$rows = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <div class="container bg-light">
        <div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
            <div class="py-5 bg-light">
                <!-- use multipart/form-data when your form includes any <input type="file"> elements -->
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" placeholder="Nom du produit">
                    </div>
                    <div class="form-group">
                        <label for="category">Catégories</label>
                        <select class="form-control" name="category" id="category">
                            <option selected>Sélectionner une catégorie</option>
                            <?php foreach($rows as $row) : ?>
                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            <?php endforeach ?>
                        </select>
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