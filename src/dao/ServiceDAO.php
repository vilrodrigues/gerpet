<?php

require_once('../models/Service.php');
require_once('GenericDAO.php');

class ServiceDAO extends GenericDAO {

  public function adicionar($service) {
    $sql = 'INSERT INTO service (name, description, price) VALUES(?,?,?)';
    $this->create($sql, Array($service->getName(), $service->getDescription(), $service->getPrice()));
  }

  public function alterar($service) {
    $sql = 'UPDATE service SET name=?, description=?, price=? where id=?';
    $this->update($sql, Array($service->getName(), $service->getDescription(), $service->getPrice(), $service->getId()));
  }

  public function remover($id) {
    $sql = 'DELETE FROM service WHERE id=?';
    $this->delete($sql, $id);
  }

  public function selecionarPeloNome($name) {
    $sql = 'SELECT * FROM service WHERE name like ?';
    $query = $this->read($sql, Array($name));
    return $query;
  }

  public function selecionarPeloId($id) {
    $sql = 'SELECT * FROM service WHERE id = ?';
    $query = $this->read($sql, Array($id));
    return $query;
  }

}

?>