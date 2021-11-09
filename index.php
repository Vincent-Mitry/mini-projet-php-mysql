<?php

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/header.php';

?>

<main>
    <div class="py-5">
        <div class="container">
            <div class="row">

                <?php
                    $products = [
                        'name' => 'produit',
                        'image' => 'https://fakeimg.pl/250x100/'
                    ];
                ?>

                <?php for($i=0; $i<=10; $i++): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img src="<?= $products['image'] ?>" alt="" class="img-fluid">
                            <h3 class="card-title text-center"><?= $products['name'] . " " . $i ?></h3>
                        </div>
                    </div>
                <?php endfor ?>
            

            </div>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/includes/footer.php';

