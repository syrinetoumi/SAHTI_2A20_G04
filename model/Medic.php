<?php
class Medic
{
    private ?int $id = null;
    private ?string $medicament = null;
    private ?string $photo = null;
    private ?string $lien = null;

    public function __construct($id=null ,$m, $p, $l)
    {
        $this->id = $id;
        $this->medicament = $m;
        $this->photo = $p;
        $this->lien = $l;
    }

    public function getidmed()
    {
        return $this->id;
    }

    public function getmedicament()
    {
        return $this->medicament;
    }


    public function setmedicament($m)
    {
        $this->medicament = $m;

        return $this;
    }


    public function getphoto()
    {
        return $this->photo;
    }
    
    public function setphoto($p)
    {
        $this->photo = $p;
    
        return $this;
    }
    

    public function getlien()
    {
        return $this->lien;
    }


    public function setlien($l)
    {
        $this->lien = $l;

        return $this;
    }
}
