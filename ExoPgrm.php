<?php

class ExoPgrm
{
    public $id;
    public $idPgrm;
    public $idExo;
    public $nbserie;
    public $nbrep;
    public $tempsRepos;

    public function __construct($id, $idPgrm, $idExo, $nbserie, $nbrep, $tempsRepos)
    {
        $this->id = $id;
        $this->idPgrm = $idPgrm;
        $this->idExo = $idExo;
        $this->nbserie = $nbserie;
        $this->nbrep = $nbrep;
        $this->tempsRepos = $tempsRepos;
    }
}