<?php

class Product {
  private $id;
  private $name;
  private $description;
  private $category;
  private $price;
  private $createdAt;
  private $updatedAt;

  function __construct($name, $description, $category, $price) {
    $this->name = $name;
    $this->description = $description;
    $this->category = $category;
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

  public function setCategory($category) {
    $this->category = $category;
  }

  public function setPrice($price) {
    $this->price = $price;
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

  public function getDescription() {
    return $this->description;
  }
  
  public function getCategory() {
    return $this->category;
  }

  public function getPrice() {
    return $this->price;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }
  
  public function getUpdatedAt() {
    return $this->updatedAt;
  }
}

?>