<?php

class RDV_Consultation
{
    private int $cin;
    private string $nom;
    private string $prenom;
    private string $email;
    private int $tel;
    private string $maladie;
    private string $dateRdv;
    private string $nom_medecin;
    private string $adresse_medecin;

   public function __construct(int $a,string $b,string $c,string $d,int $e,string $f,string $g,string $h,string $i)
    {
        $this->cin=$a;
        $this->nom=$b;
        $this->prenom=$c;
        $this->email=$d;
        $this->tel=$e;
        $this->maladie=$f;
        $this->dateRdv=$g;
        $this->nom_medecin=$h;
        $this->adresse_medecin=$i;
    }
    public function getCin()
    {
        return $this->cin;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($n)
    {
        $this->nom=$n;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($p)
    {
        $this->prenom=$p;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($e)
    {
        $this->email=$e;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setTel($t)
    {
        $this->tel=$t;
    }

    public function getMaladie()
    {
        return $this->maladie;
    }

    public function setMaladie($m)
    {
        $this->maladie=$m;
    }

    public function getDateRdv()
    {
        return $this->dateRdv;
    }

    public function setDateRdv($dr)
    {
        $this->dateRdv=$dr;
    }

    public function getNom_medecin()
    {
        return $this->nom_medecin;
    }
    
    public function setNom_medecin($nm)
    { 
        $this->nom_medecin=$nm;
    }

    public function getAdresse_medecin()
    {
        return $this->adresse_medecin;
    }

    public function setAdresse_medecin($am)
    {
        $this->adresse_medecin=$am;
    }
}
?>
