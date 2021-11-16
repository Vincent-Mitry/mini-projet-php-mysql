<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../includes/header.php';

if($_POST){

    $data = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'duration' => $_POST['duration'],
        'category' => $_POST['category'],
        'type' => $_POST['type'],
        'file' => $_POST['file'],
        'id' => $_GET['id']
    ];

    $sql = "UPDATE `item`
            SET `title`=:title, `description`=:description, `duration`=:duration, `category_id`=:category, `type`=:type, `file`=:file
            WHERE `id`=:id";
    
    $pdoStatement= $pdo->prepare($sql);

    $pdoStatement->execute($data);

}

// On récupère les catégories
$pdoStatement = $pdo->query("SELECT `id`, `name` FROM `category`");

$categories = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

// On pré-filtre les données avec les anciennes valeurs
if ($_GET){
    
    $pdoStatement = $pdo->query("SELECT * FROM `item` WHERE `id`=" . $_GET['id']);

    $item = $pdoStatement->fetch(PDO::FETCH_ASSOC);

    var_dump($item);
}

?>



<main>
    <div class="container bg-light">
        <div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
            <div class="py-5 bg-light">
                <!-- use multipart/form-data when your form includes any <input type="file"> elements -->
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Nom du produit" value="<?= $item['title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" id="description" placeholder="Description"><?= $item['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="duration">Durée</label>
                        <input type="text" class="form-control" name="duration" id="duration" placeholder="Durée" value="<?= $item['duration'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="category">Catégories</label>
                        <select class="form-control" name="category" id="category">
                            <option selected>Sélectionner une catégorie</option>
                            <?php foreach($categories as $category) : ?>
                                <option <?= ($item['category_id'] == $category['id']) ? "selected" : '' ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" name="type" id="type">
                            <option selected><?= ($item['type']) ?></option>
                            <?php if($item['type'] == 1) : ?>
                                <option value='2'>2</option>
                            <?php else : ?>
                                <option value='1'>1</option>
                            <?php endif ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        <label for="file">Fichier</label>
                        <input type="text" class="form-control-file" name="file" id="file" value="<?= $item['file'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </form> 
            </div>
        </div>
    </div>
</main>



<?php

require_once __DIR__ . '/../../includes/footer.php';