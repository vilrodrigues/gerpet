<?php

class User {
  private $id;
  private $name;
  private $login;
  private $password;
  private $createdAt;
  private $updatedAt;
  private $role;

  function __construct($name, $login, $password, $role='client') {
    $this->name = $name;
    $this->login = $login;
    $this->password = $password;
    $this->role = $role;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setName($name) {
    $this->name = $name; 
  }

  public function setLogin($login) {
    $this->login = $login;
  }

  public function setPassword($password) {
    $this->password = $password;
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

  public function getLogin() {
    return $this->login;
  }
  
  public function getPassword() {
    return $this->password;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }
  
  public function getUpdatedAt() {
    return $this->updatedAt;
  }

  public function getRole() {
    return $this->role;
  }
}

?>