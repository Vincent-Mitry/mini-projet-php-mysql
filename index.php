<?php

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/header.php';

?>

<main>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div>
                    <a href="/divers/mini-projet-php-mysql/src/user/new.php" class="btn btn-success">Créer un compte</a>
                </div>
                <div>
                    <a href="/divers/mini-projet-php-mysql/src/user/login.php" class="btn btn-primary">Connexion</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once __DIR__ . '/includes/footer.php';

