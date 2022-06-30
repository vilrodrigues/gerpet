<?php

require_once('../models/Category.php');
require_once('GenericDAO.php');

class CategoryDAO extends GenericDAO {

  public function adicionar($category) {
    $sql = 'INSERT INTO category (name) VALUES(?)';
    $this->create($sql, Array($category->getName()));
  }

  public function alterar($category) {
    $sql = 'UPDATE category SET name=?, updatedAt=now() where id=?';
    $this->update($sql, Array($category->getName(), $category->getId()));
  }

  public function remover($id) {
    $sql = 'DELETE FROM category WHERE id=?';
    $this->delete($sql, $id);
  }

  public function selecionarPeloNome($name) {
    $sql = 'SELECT * FROM category WHERE name like ?';
    $query = $this->read($sql, Array($name));
    return $query;
  }

  public function selecionarPeloId($id) {
    $sql = 'SELECT * FROM category WHERE id = ?';
    $query = $this->read($sql, Array($id));
    return $query;
  }
}

?>