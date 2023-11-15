<?php
class vehicule
{
    private ?int $vehicule_id= null;
    private ?string $marque = null;
    private ?string $modele = null;
    private ?string $annee = null;
    private ?string $planum = null;

    public function __construct($id = null, $ma, $mo, $a, $pl)
    {
        $this->vehicule_id = $id;
        $this->$marque = $ma;
        $this->modele= $mo;
        $this->annee = $a;
        $this->teplanum = $pl;
    }


    public function getvehicule_id()
    {
        return $this->vehicule_id;
    }


    public function getmarque()
    {
        return $this->marque;
    }


    public function setmarque($marque)
    {
        $this->nom = $marque ;

        return $this;
    }


    public function getmodele()
    {
        return $this->modele;
    }


    public function setmodele($modele)
    {
        $this->prenom = $modele;

        return $this;
    }


    public function getannee()
    {
        return $this->annee;
    }


    public function setannee($annee)
    {
        $this->email = $annee;

        return $this;
    }


    public function getplanum()
    {
        return $this->planum;
    }


    public function seplanum($planum)
    {
        $this->tel = $planum;

        return $this;
    }
}
