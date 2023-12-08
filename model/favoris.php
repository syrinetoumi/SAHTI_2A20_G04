<?php


class Favoris
{
    private ?int $idfavoris = null;
   

    public function __construct($id = null)
    {
        $this->idfavoris = $id;
        
    }

    public function getidfavoris()
    {
        return $this->idfavoris;
    }
}

?>