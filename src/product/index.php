<?php

require_once (__DIR__ . '/../../config/database.php');
require_once (__DIR__ . '/../../includes/header.php');

$sql = $pdo->query("SELECT `title`, `file`, `id` FROM `item`");

$rows = $sql->fetchAll(PDO::FETCH_ASSOC);

// var_dump($rows);

?>

<main>
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php foreach($rows as $row): ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="<?= $row['file']; ?>" alt="" class="img-fluid">
                            <a href="/divers/mini-projet-php-mysql/src/product/show.php?id=<?= $row['id'] ?>"><h3 class="card-title text-center"><?= $row['title'] ?></h3></a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</main>

<?php

require_once __DIR__ . '/../../includes/footer.php';
