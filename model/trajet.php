<?php

class Trajet
{
    private ?int $trajet_id = null;
    private ?string $etat = null;
    private ?int $annee_exp	 = null;
    private ?string $routes_pre = null;
    private ?string $pref_veh = null;
    private ?string $comp_spe = null;

    public function __construct($id = null, $et, $ae, $rp, $pv, $cp)
    {
        $this->trajet_id = $id;
        $this->etat = $et;
        $this->annee_exp = $ae;
        $this->routes_pre = $rp;
        $this->pref_veh = $pv;
        $this->comp_spe = $cp;
    }

    public function getTrajetId()
    {
        return $this->trajet_id;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    public function setEtat($etat)
    {
        $this->etat = $et;
        return $this;
    }

    public function getAnnee_exp()
    {
        return $this->annee_exp;
    }

    public function setAnnee_exp($annee_exp	)
    {
        $this->annee_exp = $annee_exp	; // Fix the variable name here
        return $this;
    }

    public function getRoutesPreferees()
    {
        return $this->routes_pre; // Fix the variable name here
    }

    public function setRoutesPreferees($routes_pre)
    {
        $this->routes_pre = $routes_pre; // Fix the variable name here
        return $this;
    }

    public function getPreferenceVehicule()
    {
        return $this->pref_veh; // Fix the variable name here
    }

    public function setPreferenceVehicule($pref_veh)
    {
        $this->pref_veh = $pref_veh; // Fix the variable name here
        return $this;
    }

    public function getCompetencesSpeciales()
    {
        return $this->comp_spe; // Fix the variable name here
    }

    public function setCompetencesSpeciales($comp_spe)
    {
        $this->comp_spe = $comp_spe; // Fix the variable name here
        return $this;
    }
}
