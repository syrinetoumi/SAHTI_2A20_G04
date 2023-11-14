<?php
class medecin
{
    private ?int $id_med = null;
    private ?string $nom_med = null;
    private ?string $prenom_med = null;
    private ?string $cin_med = null;
    private ?string $tel_med = null;
    private ?string $e_mail_med = null;
    private ?string $specialite_med = null;
    private ?string $mdp_med = null;




    public function __construct($id = null, $n, $p, $c, $t ,$e , $s , $m)
    {
        $this->id_med = $id;
        $this->nom_med = $n;
        $this->prenom_med = $p;
        $this->cin_med = $c;
        $this->tel_med = $t;
        $this->e_mail_med = $e;
        $this->specialite_med = $s;
        $this->mdp_med = $m;



    }


    public function getId_med()
    {
        return $this->id_med;
    }


    public function getNom_med()
    {
        return $this->nom_med;
    }


    public function setNom_med($nom_med)
    {
        $this->nom_med= $nom_med;

        return $this;
    }


    public function getPrenom_med()
    {
        return $this->prenom_med;
    }


    public function setPrenom_med($prenom_med)
    {
        $this->prenom_med= $prenom_med;

        return $this;
    }


    public function getmail_med()
    {
        return $this->e_mail_med;
    }


    public function setmail_med($e_mail_med)
    {
        $this->e_mail_med = $e_mail_med;

        return $this;
    }


    public function getTel_med()
    {
        return $this->tel_med;
    }


    public function setTel_med($tel_med)
    {
        $this->tel_med = $tel_med;

        return $this;
    }
    public function getspe_med()
{
    return $this->specialite_med;
}


public function setspe_med($specialite_med)
{
    $this->specialite_med =$specialite_med;

    return $this;
}


public function getmdp_med()
{
    return $this->mdp_med;
}


public function setmdp_med($mdp_med)
{
    $this->mdp_med =$mdp_med;

    return $this;
}

}



