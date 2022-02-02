<?php
class Country{
//idCountry	name	population	region	subregion	flag	capital
private $idCountry;
private $name;
private $population;
private $region;
private $subregion;
private $flag;
private $capital;

    /**
     * @return mixed
     */
    public function getIdCountry()
    {
        return $this->idCountry;
    }

    /**
     * @param mixed $idCountry
     */
    public function setIdCountry($idCountry): void
    {
        $this->idCountry = $idCountry;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @param mixed $population
     */
    public function setPopulation($population): void
    {
        $this->population = $population;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region): void
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getSubregion()
    {
        return $this->subregion;
    }

    /**
     * @param mixed $subregion
     */
    public function setSubregion($subregion): void
    {
        $this->subregion = $subregion;
    }

    /**
     * @return mixed
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * @param mixed $flag
     */
    public function setFlag($flag): void
    {
        $this->flag = $flag;
    }

    /**
     * @return mixed
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @param mixed $capital
     */
    public function setCapital($capital): void
    {
        $this->capital = $capital;
    }


}
?>