<?php

class User {
  private $id;
  private $name;
  private $login;
  private $password;
  private $permission;
  private $createdAt;
  private $updatedAt;

  function __construct($name, $login, $password, $permission) {
    $this->name = $name;
    $this->login = $login;
    $this->password = $password;
    $this->permission = $permission;
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

  public function setPermission($permission) {
    $this->permission = $permission;
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

  public function getPermission() {
    return $this->permission;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }
  
  public function getUpdatedAt() {
    return $this->udatedAt;
  }
}

?>