<?php
require_once("model/managers/destinationManager.php");
class Reservation {
    // idReservation 	number 	departureDate 	submitDate 	idDestination 	idUser 
    private $idReservation;
    private $number;
    private $departureDate;
    private $submitDate;
    private $idDestination;
    private $idUser;
    

    /**
     * Get the value of idReservation
     */ 
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    /**
     * Set the value of idReservation
     *
     * @return  self
     */ 
    public function setIdReservation($idReservation)
    {
        $this->idReservation = $idReservation;

        return $this;
    }

    /**
     * Get the value of number
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */ 
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the value of departureDate
     */ 
    public function getDepartureDate()
    {
        return $this->departureDate;
    }

    /**
     * Set the value of departureDate
     *
     * @return  self
     */ 
    public function setDepartureDate($departureDate)
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    /**
     * Get the value of submitDate
     */ 
    public function getSubmitDate()
    {
        return $this->submitDate;
    }

    /**
     * Set the value of submitDate
     *
     * @return  self
     */ 
    public function setSubmitDate($submitDate)
    {
        $this->submitDate = $submitDate;

        return $this;
    }

    /**
     * Get the value of idDestination
     */ 
    public function getIdDestination()
    {
        return $this->idDestination;
    }

    /**
     * Set the value of idDestination
     *
     * @return  self
     */ 
    public function setIdDestination($idDestination)
    {
        $this->idDestination = $idDestination;

        return $this;
    }

    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Méthode qui permet de recupere l'objet destination d'une reservation
     *
     * @param [type] $aPDO
     * @return Destination un objet destination 
     */
    public function destination($aPDO){
        $objectDestinationManager= new DestinationManager($aPDO);
        $aDestination=$objectDestinationManager->fetchDestinationByIdDestination($this->idDestination);
        return $aDestination;
    }
}
?>