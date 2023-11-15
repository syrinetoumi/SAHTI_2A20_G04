<?php
class Ordo
{
    private ?int $Num = null;
    private ?string $NomMed = null;
    private ?string $Dosage = null;
    private ?string $Durée = null;
    private ?string $Rq = null;

    public function __construct($numero = null, $nomMed, $dosage, $duree, $rq)
    {
        $this->Num = $numero;
        $this->NomMed = $nomMed;
        $this->Dosage = $dosage;
        $this->Durée = $duree;
        $this->Rq = $rq;
    }

    public function getNumero()
    {
        return $this->Num;
    }

    public function getNomMed()
    {
        return $this->NomMed;
    }

    public function setNomMed($nomMed)
    {
        $this->NomMed = $nomMed;

        return $this;
    }

    public function getDosage()
    {
        return $this->Dosage;
    }

    public function setDosage($dosage)
    {
        $this->Dosage = $dosage;

        return $this;
    }

    public function getDuree()
    {
        return $this->Durée;
    }

    public function setDuree($duree)
    {
        $this->Durée = $duree;

        return $this;
    }

    public function getRq()
    {
        return $this->Rq;
    }

    public function setRq($rq)
    {
        $this->Rq = $rq;

        return $this;
    }
}
?>
