<?php

class Category {
  private $id;
  private $name;
  private $createdAt;
  private $updatedAt;

  function __construct($name) {
    $this->name = $name;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setName($name) {
    $this->name = $name; 
  }
  
  public function setCreatedAt($createdAt) {
    $this->createdAt = $createdAt;
  }

  public function setUpdatedAt($updatedAt) {
    $this->updatedAt = $updatedAt;
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }
  
  public function getUpdatedAt() {
    return $this->updatedAt;
  }
}

?>