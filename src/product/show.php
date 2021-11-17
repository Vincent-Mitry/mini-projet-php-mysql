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
            <div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
                <h3><?= $row['title'] ?></h3>
                <div>
                    <a href="/divers/mini-projet-php-mysql/src/product/edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Modifier</a>
                    <a href="/divers/mini-projet-php-mysql/src/product/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Supprimer</a>
                </div>
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($rows as $row): ?>
                        <tr>
                            <th scope="row"><?= $row['id'] ?></th>
                            <td><?= ($row['type'] == 1) ? "Film" : "Série" ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= isset($row['avg_note']) ? $row['avg_note'] : 'N/A' ?></td>
                            <td><a href="/divers/mini-projet-php-mysql/src/product/note.php?id=<?= $row['id'] ?>" class="btn btn-primary">Noter</a></td>
                        </tr>
                    <?php endforeach ?>    
                    </tbody>
                </table>
            </div>
                <div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
                <h3>Commentaires</h3>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">User</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($comments as $c) : ?>
                        <tr>
                            <td><?=$c['email']?></td>
                            <td><?=$c['comment']?></td>
                            <td><?=$c['note']?></td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</main>



<?php

require_once __DIR__ . '/../../includes/footer.php';