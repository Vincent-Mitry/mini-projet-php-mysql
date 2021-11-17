<?php

require_once (__DIR__ . '/../../config/database.php');
require_once (__DIR__ . '/../../includes/header.php');

$rows=[];
if($_GET){

    $pdoStatement = $pdo->prepare("SELECT * FROM `item` WHERE `title` LIKE ? AND `type` = ? AND `category_id` = ?");
    $pdoStatement->bindValue(1, '%' . $_GET['title'] . '%');
    $pdoStatement->bindValue(2, $_GET['type']);
    $pdoStatement->bindValue(3, $_GET['category']);
    $pdoStatement->execute();

    $rows = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
} else {
    $pdoStatement = $pdo->query("SELECT * FROM `item`");
    $rows = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
}


$pdoStatement2 = $pdo->query("SELECT `id`, `name` FROM `category`");
$categories = $pdoStatement2->fetchAll(PDO::FETCH_ASSOC);

// var_dump($rows);

?>

<main>
    <div class="py-5 bg-light">
        <div class="container">
            <div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
                <form methode="get" class="col-md-6">
                    <div class="md-form mt-0">
                        <input type="text" class="form-control" name="title" placeholder="Recherche" aria-label="Recherche" value="<?= isset($_GET['title']) ? $_GET['title'] : "" ?>">
                        <select class="form-control" name="category" id="category">
                            <option selected>Sélectionner une catégorie</option>
                            <?php foreach($categories as $category) : ?>
                                <option <?php if(isset($_GET['category'])){
                                    echo ($_GET['category'] == $category['id']) ? "selected" : '';
                                } ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <label>
                                <input type="radio" id="type1" name="type" value="1" checked<?php if(isset($_GET['type'])){
                                    echo ($_GET['type'] == 1) ? "" : 'checked';
                                } ?>>
                                Film
                            </label>
                            <label>
                                <input type="radio" id="type2" name="type" value="2" <?php if(isset($_GET['type'])){
                                    echo ($_GET['type'] == 2) ? "checked" : '';
                                } ?>>
                                Série
                        </label>
                        <button type="submit">Valider</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Type</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Note</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($rows as $row): ?>
                        <tr>
                            <th scope="row"><?=$i++?></th>
                            <td><?= ($row['type'] == 1) ? "Film" : "Série" ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><a href="/divers/mini-projet-php-mysql/src/product/note.php?id=<?= $row['id'] ?>" class="btn btn-primary">Noter</a></td>
                        </tr>
                    <?php endforeach ?>    
                    </tbody>
                </table>
            </div>
            <a href="/divers/mini-projet-php-mysql/src/product/new.php" class="btn btn-primary">Ajout d'un Produit</a>
        </div>
    </div>
</main>

<?php

require_once __DIR__ . '/../../includes/footer.php';
