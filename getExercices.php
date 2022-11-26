<?php
require "DataBase.php";
$db = new DataBase();
if ($db->dbConnect()) {
    if (!$db->getExercices("exercices")) {
        echo "La recuperation des exercices a echouée";
    }
} else echo "Error: Database connection";
?>
