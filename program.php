<?php
class programme
{
    private ?int $idprogramme = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $maladie = null;
    private ?string $exercice = null;
    private ?string $date_debut = null;
    private ?string $date_fin = null;
    private ?int $tel = null;

    public function __construct($idprogramme = null, $nom, $prenom, $maladie, $exercice, $date_debut, $date_fin, $tel)
    {
        $this->idprogramme = $idprogramme;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->maladie = $maladie;
        $this->exercice = $exercice;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->tel = $tel;

        
    }


    public function getIdProgram()
    {
        return $this->idprogramme;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getMaladie()
    {
        return $this->maladie;
    }


    public function setMaladie($maladie)
    {
        $this->maladie = $maladie;

        return $this;
    }


    public function getExercice()
    {
        return $this->exercice;
    }


    public function setExercice($exercice)
    {
        $this->exercice = $exercice;

        return $this;
    }


    public function getDatedebut()
    {
        return $this->date_debut;
    }


    public function setDatedebut($date_debut)
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDatefin()
    {
        return $this->date_fin;
    }


    public function setDatefin($date_fin)
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function gettel()
    {
        return $this->tel;
    }


    public function settel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    
}
