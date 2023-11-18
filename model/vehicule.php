<?php
class vehicule
{
    private ?int $vehicle_id= null;
    private ?string $marque = null;
    private ?string $modele = null;
    private ?string $annee = null;
    private ?string $plnum = null;

    public function __construct($id = null, $ma, $mo, $a, $pl)
{
    $this->vehicule_id = $id;
    $this->marque = $ma;  // Fix the typo here
    $this->modele = $mo;
    $this->annee = $a;
    $this->plnum = $pl;
}



    public function getvehicule_id()
    {
        return $this->vehicle_id;
    }


    public function getmarque()
    {
        return $this->marque;
    }


    public function setmarque($marque)
{
    $this->marque = $marque;
    return $this;
}

    public function getmodele()
    {
        return $this->modele;
    }


    public function setmodele($modele)
{
    $this->modele = $modele;
    return $this;
}



    public function getannee()
    {
        return $this->annee;
    }


    public function setannee($annee)
{
    $this->annee = $annee;
    return $this;
}

    public function getplanum()
    {
        return $this->plnum;
    }


    public function seplanum($plnum)
{
    $this->planum = $plnum;
    return $this;
}
}
