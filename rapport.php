<?php
class rapport
{
    
    private ?string $seances_restantes = null;
    private ?string $progres = null;
    private ?string $satisfaction = null;
    

    public function __construct($seances_restantes, $progres, $satisfaction)
    {
        $this->seances_restantes = $seances_restantes;
        $this->progres = $progres;
        $this->satisfaction = $satisfaction;
        

        
    }


    public function getSeancesRestantes()
    {
        return $this->seances_restantes;
    }


    public function setSeancesRestantes($seances_restantes)
    {
        $this->seances_restantes = $seances_restantes;

        return $this;
    }


    public function getProgres()
    {
        return $this->progres;
    }


    public function setProgrés($progres)
    {
        $this->progres = $progres;

        return $this;
    }


    public function getSatisfaction()
    {
        return $this->satisfaction;
    }


    public function setSatisfaction($satisfaction)
    {
        $this->satisfaction = $satisfaction;

        return $this;
    }

}
