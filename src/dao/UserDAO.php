<?php

require_once('../models/User.php');
require_once('GenericDAO.php');

class UserDAO extends GenericDAO {

  public function adicionar($user) {
    $sql = 'INSERT INTO user (name, login, password, permission) VALUES(?,?,?,?)';
    $this->create($sql, Array($user->getName(), $user->getLogin(), $user->getPassword(), $user->getPermission()));
  }

  public function alterar($user) {
    $sql = 'UPDATE user SET name=?, login=? password=?, permission=?, updatedAt=now() where id=?';
    $this->update($sql, Array($user->getName(), $user->getLogin(), $user->getPassword(), $user->getPermission(), $user->getId()));
  }

  public function remover($id) {
    $sql = 'DELETE FROM user WHERE id=?';
    $this->delete($sql, $id);
  }

  public function selecionarPeloNome($name) {
    $sql = 'SELECT * FROM user WHERE name like ?';
    $query = $this->read($sql, Array($name));
    return $query;
  }

  public function selecionarPeloId($id) {
    $sql = 'SELECT * FROM user WHERE id = ?';
    $query = $this->read($sql, Array($id));
    return $query;
  }

  public function listarTodos() {
    $sql = 'SELECT * FROM user';
    $query = $this->readAll($sql);
    return $query;
  }

  public function login($login, $password) {
    $sql = 'SELECT * FROM user WHERE login = ? AND password = ?';
    $query = $this->read($sql, Array($login, $password));
    if (sizeof($query) == 1) {
      $user = new User($query[0]['name'], $query[0]['login'], $query[0]['password'], $query[0]['permission']);
      $user->setId($query[0]['id']);
      return $user;
    }
    return null;
  }
}

?>