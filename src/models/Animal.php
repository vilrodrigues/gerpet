<?php

Class Animal {
  private $id;
  private $name;
  private $nickname;
  private Customer $owner;
  private $createdAt;
  private $updatedAt;

  function __construct($name, $nickname, $owner) {
    $this->name = $name;
    $this->nickname = $nickname;
    $this->owner = $owner;
    $this->createdAt = date_create()->format('Y-m-d H:i:s');
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function setNickname($nickname) {
    $this->nickname = $nickname;
  }

  public function setOwner($owner) {
    $this->owner = $owner;
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

  public function getNickname() {
    return $this->nickname;
  }

  public function getOwner() {
    return $this->owner;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }

  public function getUpdatedAt() {
    return $this->updatedAt;
  }
}