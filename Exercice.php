<?php

class Exercice
{
    public $id;
    public $nom;
    public $muscle;
    public $description;

    public function __construct($id, $nom, $muscle, $description){
        $this->id = $id;
        $this->nom = $nom;
        $this->muscle = $muscle;
        $this->description = $description;
    }
}