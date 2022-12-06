<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['id'])) {
    if ($db->dbConnect()) {
        if ($db->deleteExoPgrm("exopgrm", $_POST['id'])) {
            echo "Delete success";
        } else echo "La suppression de l'exercice a échoué";
    } else echo "Error: Database connection";
} else echo "All fields are required";