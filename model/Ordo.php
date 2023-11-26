<?php
class Ordo
{
    private ?int $numMedic = null;
    private ?string $nommed = null;
    private ?string $dosage = null;
    private ?string $duree = null;
    private ?string $rq = null;

    public function __construct($id = null, $n, $p, $a, $d)
    {
        $this->numMedic = $id;
        $this->nommed = $n;
        $this->dosage = $p;
        $this->duree = $a;
        $this->rq = $d;
    }


    public function getidordo()
    {
        return $this->numMedic;
    }


    public function getnommed()
    {
        return $this->nommed;
    }


    public function setnommed($n)
    {
        $this->nommed = $n;

        return $this;
    }


    public function getdosage()
    {
        return $this->dosage;
    }


    public function setdosage($p)
    {
        $this->dosage = $p;

        return $this;
    }


    public function getduree()
    {
        return $this->duree;
    }


    public function setduree($a)
    {
        $this->duree = $a;

        return $this;
    }


    public function getrq()
    {
        return $this->rq;
    }


    public function setrq($d)
    {
        $this->rq = $d;

        return $this;
    }
}

?>
