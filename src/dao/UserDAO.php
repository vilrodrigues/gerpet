<?php

require_once('src/models/User.php');
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
}

?>