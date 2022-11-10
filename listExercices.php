<?php
require "DataBase.php";
$db = new DataBase();
    if ($db->dbConnect()) {
        $html = $db->getExercices("exercices");
        if (!$html) {
            echo "La recuperation des exercices a echouee";
        }
    } else echo "Error: Database connection";
?>
