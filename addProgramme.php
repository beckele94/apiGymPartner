<?php
require "DataBase.php";
$db = new DataBase();
if(isset($_POST['idUser']) && isset($_POST['nom'])){
    if($db->dbConnect()) {
        if ($db->addProgramme("programmes", $_POST['idUser'], $_POST['nom'])) {
            echo "Add success";
        } else echo "L'ajout du programme a échoué";
    } else echo "Error: Database connection";
} else echo "All fields are required";