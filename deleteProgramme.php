<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['id'])) {
    if ($db->dbConnect()) {
        if ($db->deleteProgramme("programmes", $_POST['id'])) {
            echo "Delete success";
        } else echo "La suppression du programme a échoué";
    } else echo "Error: Database connection";
} else echo "All fields are required";