<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../includes/header.php';

if($_GET) {

    $rows = $pdo->exec("DELETE FROM `item` WHERE `id` =" . $_GET['id']);
    
    if($rows > 0) {
        header("Location: index.php");
    } else {
        echo 'Erreur lors de la suppression';
    }

}

?>







<?php

require_once __DIR__ . '/../../includes/footer.php';