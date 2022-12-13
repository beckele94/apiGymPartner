<?php

class ExoPgrm
{
    public $id;
    public $idPgrm;
    public $idExo;
    public $nbSerie;
    public $nbRep;
    public $tempsRepos;
    public $poids;

    public function __construct($id, $idPgrm, $idExo, $nbserie, $nbrep, $tempsRepos, $poids)
    {
        $this->id = $id;
        $this->idPgrm = $idPgrm;
        $this->idExo = $idExo;
        $this->nbSerie = $nbserie;
        $this->nbRep = $nbrep;
        $this->tempsRepos = $tempsRepos;
        $this->poids = $poids;
    }
}