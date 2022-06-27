<?php

Class Customer {
  private $id;
  private $name;
  private $email;
  private $createdAt;
  private $updatedAt;

  function __construct($name, $email) {
    $this->name = $name;
    $this->email = $email;
    $this->createdAt = date_create()->format('Y-m-d H:i:s');
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function setEmail($email) {
    $this->email = $nickname;
  }

  public function setUpdatedat($updatedAt) {
    $this->updatedAt = $updatedAt;
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }

  public function getUpdatedAt() {
    return $this->updatedAt;
  }
}