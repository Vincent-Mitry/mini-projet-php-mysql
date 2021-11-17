<?php

require_once (__DIR__ . '/../../config/database.php');
require_once (__DIR__ . '/../../includes/header.php');


$pdoStatement = $pdo->query("SELECT `i`.*, ROUND(AVG(`n`.`note`), 1) AS `avg_note` FROM `item` as `i` LEFT JOIN `note` as `n` ON `i`.`id` = `n`.`item_id` GROUP BY `i`.`id` ORDER BY RAND() LIMIT 1");
$rows = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

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
        </div>
    </div>
</main>

<?php

require_once __DIR__ . '/../../includes/footer.php';