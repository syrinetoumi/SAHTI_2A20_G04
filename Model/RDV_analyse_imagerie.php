<?php

class RDV_analyse_imagerie
{
    private int $id;
    private string $centre_analyse;
    private string $imagerie;
    private string $nom_radiologue;

    public function __construct(int $a, string $b, string $c, string $d)
    {
        $this->id = $a;
        $this->centre_analyse = $b;
        $this->imagerie = $c;
        $this->nom_radiologue = $d;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCentre_analyse()
    {
        return $this->centre_analyse;
    }

    public function setCentre_analyse($n)
    {
        $this->centre_analyse = $n;
    }

    public function getImagerie()
    {
        return $this->imagerie;
    }

    public function setImagerie($p)
    {
        $this->imagerie = $p;
    }

    public function getNom_radiologue()
    {
        return $this->nom_radiologue;
    }

    public function setNom_radiologue($e)
    {
        $this->nom_radiologue = $e;
    }
}
?>
