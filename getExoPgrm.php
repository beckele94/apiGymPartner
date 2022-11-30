<?php
require "DataBase.php";
$db = new DataBase();
if(isset($_POST['idPgrm'])){
    if($db->dbConnect()) {
        if (!$db->getExoPgrm("exopgrm", $_POST['idPgrm'])) {
            echo "La recuperation des exercices a echouée";
        }
    } else echo "Error: Database connection";
} else echo "All fields are required";
