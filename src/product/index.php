<?php

require_once (__DIR__ . '/../../config/database.php');
require_once (__DIR__ . '/../../includes/header.php');

$sql = $pdo->query("SELECT * FROM `item`");

$rows = $sql->fetchAll(PDO::FETCH_ASSOC);

// var_dump($rows);

?>

<main>
    <div class="py-5 bg-light">
        <div class="container">
            <div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Type</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($rows as $row): ?>
                        <tr>
                            <th scope="row"><?=$i++?></th>
                            <td><?= ($row['type'] == 1) ? "Film" : "Série" ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['description'] ?></td>
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
