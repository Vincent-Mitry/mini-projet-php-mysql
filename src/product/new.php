<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../includes/header.php';

var_dump($_POST);

if($_POST){

    // $filename = '';
    
    // if(!empty($_FILES['file'])){
    
    //     $targetDirectory = "../../uploads/";
    //     $file = $_FILES['file']['name'];
    
    //     $path = pathinfo($file);
    //     $filename = $path['filename'];
    //     $ext = $path['extension'];
    
    //     $tmpName = $_FILES['file']['tmp_name'];
    //     $path_filename_ext = $targetDirectory . $filename . '.' . $ext;
    //     if(move_uploaded_file($tmpName, $path_filename_ext)){
    //         $filename = $filename . '.' . $ext;
    //     }
    // }

    $sql = "INSERT INTO `item` (title, description, duration, file, type, category_id)
            VALUES (?,?,?,?,?,?)";

    $a = $pdo->prepare($sql)->execute([
        $_POST['title'],
        $_POST['description'],
        $_POST['duration'],
        $_POST['file'],
        $_POST['type'],
        $_POST['category']
    ]);
}


$pdoStatement = $pdo->query('SELECT `id`, `name` FROM `category`');

$rows = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <div class="container bg-light">
        <div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">
            <div class="py-5 bg-light">
                <!-- use multipart/form-data when your form includes any <input type="file"> elements -->
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Nom du produit">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" id="description" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="duration">Durée</label>
                        <input type="text" class="form-control" name="duration" id="duration" placeholder="Durée">
                    </div>
                    <div class="form-group">
                        <label for="category">Catégories</label>
                        <select class="form-control" name="category" id="category">
                            <option selected>Sélectionner une catégorie</option>
                            <?php foreach($rows as $row) : ?>
                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div>
                            <input type="radio" id="type1" name="type" value="1">
                            <label for="type1">Film</label>
                        </div>
                        <div>
                            <input type="radio" id="type2" name="type" value="2">
                            <label for="type2">Série</label>
                        </div> 
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        <label for="file">Fichier</label>
                        <input type="text" class="form-control-file" name="file" id="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </form> 
            </div>
        </div>
    </div>
</main>






<?php

require_once __DIR__ . '/../../includes/footer.php';