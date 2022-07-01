<?php

class Service {
  private $id;
  private $name;
  private $description;
  private $price;

  function __construct($name, $description, $price) {
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setName($name) {
    $this->name = $name; 
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function setPrice($price) {
    $this->price = $price;
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getDescription() {
    return $this->description;
  }
  
  public function getPrice() {
    return $this->price;
  }

}

?>