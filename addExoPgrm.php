<?php
require "DataBase.php";
$db = new DataBase();
if(isset($_POST['idExo']) && isset($_POST['idPgrm'])){
    if($db->dbConnect()) {
        if ($db->addExoPgrm("exopgrm", $_POST['idExo'], $_POST['idPgrm'])) {
            echo "Add success";
        } else echo "L'ajout de l'exercice dans le programme a échoué";
    } else echo "Error: Database connection";
} else echo "All fields are required";