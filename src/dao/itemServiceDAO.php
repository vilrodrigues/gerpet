<?php

require_once('../models/User.php');
require_once('GenericDAO.php');

class ItemServiceDAO extends GenericDAO {

  public function adicionar($idUser, $idProduct, $date, $price) {
    $sql = 'INSERT INTO itemService (idUser, idService, date, price) VALUES(?,?,?,?)';
    $this->create($sql, Array($idUser, $idProduct, $date, $price));
  }

}

?>