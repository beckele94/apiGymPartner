<?php
require "DataBase.php";
$db = new DataBase();
if(isset($_POST['email'])){
    if($db->dbConnect()) {
        if(!$db->getUser("users", $_POST["email"]))
        {
            echo "La recuperation de l'utilisateur a echouée";
        }
    } else echo "Error: Database connection";
} else echo "All fields are required";