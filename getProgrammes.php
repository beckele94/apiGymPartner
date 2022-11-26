<?php
require "DataBase.php";
$db = new DataBase();
if(isset($_POST['idUser'])){
    if($db->dbConnect()) {
        if (!$db->getProgrammes("programmes", $_POST['idUser'])) {
            echo "La recuperation des programmes a echouée";
        }
    } else echo "Error: Database connection";
} else echo "All fields are required";




