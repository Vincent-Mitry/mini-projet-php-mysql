<?php

require_once __DIR__ . '/../../config/database.php';


if($_POST){

    $pdoStatement = $pdo->query("SELECT `id`, `password` FROM `user` WHERE email='" . $_POST['email'] . "'");
    $user = $pdoStatement->fetch(PDO::FETCH_ASSOC);

    if(password_verify($_POST['password'], $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        header("Location:../product/index.php");
        exit();
    }
}

require_once __DIR__ . '/../../includes/header.php';

?>




<main>
    <div class="py-5 bg-light">
        <div class="container">
            <div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
                <h1>Connexion</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>
            </div>
        </div>
    </div>
</main>