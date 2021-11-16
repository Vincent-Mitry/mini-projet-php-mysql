<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../includes/header.php';

if($_GET){
    $pdoStatement = $pdo->prepare("SELECT * FROM `item` WHERE id = ?");
    $pdoStatement->bindValue(1, $_GET['id']);
    $pdoStatement->execute();

    $row = $pdoStatement->fetch(PDO::FETCH_ASSOC);
}


?>

<main>
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <h3><?= $row['title'] ?></h3>
                <div>
                    <a href="/divers/mini-projet-php-mysql/src/product/edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Modifier</a>
                    <a href="/divers/mini-projet-php-mysql/src/product/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
</main>



<?php

require_once __DIR__ . '/../../includes/footer.php';