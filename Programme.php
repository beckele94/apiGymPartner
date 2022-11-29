<?php

class Programme
{
    public $id;
    public $idUser;
    public $nom;

    public function __construct($id, $idUser, $nom){
        $this->id = $id;
        $this->idUser = $idUser;
        $this->nom = $nom;
    }
}