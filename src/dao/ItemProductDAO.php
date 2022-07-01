<?php

require_once('../models/User.php');
require_once('GenericDAO.php');

class ItemProductDAO extends GenericDAO {

  public function adicionar($idUser, $idProduct, $amount, $price) {
    $sql = 'INSERT INTO itemProduct (idUser, idProduct, amount, price) VALUES(?,?,?,?)';
    $this->create($sql, Array($idUser, $idProduct, $amount, $price));
  }

}

?>