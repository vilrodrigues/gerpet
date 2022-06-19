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

  public function setUdatedAt($udatedAt) {
    $this->udatedAt = $udatedAt;
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