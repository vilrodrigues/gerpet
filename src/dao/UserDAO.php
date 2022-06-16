<?php

require_once('src/models/User.php');
require_once('/var/www/html/src/dao/GenericDAO.php');

class UserDAO extends GenericDAO {

  public function insert($user) {
    $sql = 'INSERT INTO user (name, password, permission) VALUES(?,?,?)';
    $this->create($sql, Array($user->getName(), $user->getPassword(), $user->getPermission()));
  }
}

?>