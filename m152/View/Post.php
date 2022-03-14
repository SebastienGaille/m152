<?php

require_once '../Model/creationImage.php';
$src = "";


if (!empty($_POST))
{
    $data = file_get_contents($_FILES['userfile']['tmp_name']);
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($_FILES['userfile']['tmp_name']);
    $src = 'data:' . $mime . ';base64,' . base64_encode($data);

    insertionImage($_FILES['userfile']['name'], $src);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/main.css">
</head>
<body>
<?php
    require("../controller/nav.php")
?>

<main class="px-3">
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="nomFichierMedia">Nom de l'image</label>
        <br>
        <input type="text" placeholder="nom" name="nomFichierMedia" id="nomFichierMedia">
        <br>
        <label for="insertionImage">Insertion d'image</label>
        <br>
        <input type="file" value="Ajouter" name="userfile"> 
        <br>
        <br>
        <input type="submit" value="Envoyer" name="envoyer"> 
    </form>

    <img src="<?= $src ?>">
</main>
</body>
</html>