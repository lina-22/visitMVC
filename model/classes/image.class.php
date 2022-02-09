<?php
class Image{
  //	idImage	name	mainImage	idDestination
  private $idImage;
  private $name;
  private $mainImage;
  private $idDestination;

  

  /**
   * Get the value of idImage
   */ 
  public function getIdImage()
  {
    return $this->idImage;
  }

  /**
   * Set the value of idImage
   *
   * @return  self
   */ 
  public function setIdImage($idImage)
  {
    $this->idImage = $idImage;

    return $this;
  }

  /**
   * Get the value of name
   */ 
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */ 
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of mainImage
   */ 
  public function getMainImage()
  {
    return $this->mainImage;
  }

  /**
   * Set the value of mainImage
   *
   * @return  self
   */ 
  public function setMainImage($mainImage)
  {
    $this->mainImage = $mainImage;

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
}
?>