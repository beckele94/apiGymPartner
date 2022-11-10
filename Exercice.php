<?php

class Exercice
{
    protected $id;
    protected $nom;
    protected $muscle;
    protected $description;

    public function __construct($id, $nom, $muscle, $description){
        $this->id = $id;
        $this->nom = $nom;
        $this->muscle = $muscle;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getMuscle()
    {
        return $this->muscle;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
}