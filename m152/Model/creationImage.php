<?php 

require("connexionBD.php");

function insertionImage($nomFichierMedia,$userfile){
    try {
        $bd = CoToBase();
        $requete = $bd->prepare("INSERT INTO BASE64_IMAGES(ENCODEDIMAGE, ORIGINALFILENAME, USERS_EMAIL) VALUES(:IMG, :FILENAME, :EMAIL)");

        $requete->execute(
            array(
                ':IMG' => $userfile,
                ':FILENAME' => $nomFichierMedia,
                ':EMAIL' => 'sebastien.gll@eduge.ch'
            )
        );

    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

function ImageRecup(){

}
