<?php

class User {
  private $id;
  private $name;
  private $password;
  private $permission;
  private $createdAt;
  private $updatedAt;

  function __construct($name, $password, $permission) {
    $this->name = $name;
    $this->password = $password;
    $this->permission = $permission;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setName($name) {
    $this->name = $name; 
  }

  public function setPermission($permission) {
    $this->permission = $permission;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function setUdatedAt($udatedAt) {
    $this->udatedAt = $udatedAt;
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getPermission() {
    return $this->permission;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }
  public function getUdatedAt() {
    return $this->udatedAt;
  }
}

?>