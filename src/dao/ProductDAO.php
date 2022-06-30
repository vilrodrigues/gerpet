<?php

require_once('../models/Product.php');
require_once('GenericDAO.php');

class ProductDAO extends GenericDAO {

  public function adicionar($product) {
    $sql = 'INSERT INTO product (name, description, category, price) VALUES(?,?,?,?)';
    $this->create($sql, Array($product->getName(), $product->getDescription(), $product->getCategory(), $product->getPrice()));
  }

  public function alterar($product) {
    $sql = 'UPDATE product SET name=?, description=?, category=?, price=?, updatedAt=now() where id=?';
    $this->update($sql, Array($product->getName(), $product->getDescription(), $product->getCategory(), $product->getPrice(), $product->getId()));
  }

  public function remover($id) {
    $sql = 'DELETE FROM product WHERE id=?';
    $this->delete($sql, $id);
  }

  public function selecionarPeloNome($name) {
    $sql = 'SELECT * FROM product WHERE name like ?';
    $query = $this->read($sql, Array($name));
    return $query;
  }

  public function count($category) {
    $sql = 'SELECT count(id) FROM product WHERE category = ?';
    $query = $this->read($sql, Array($category));
    return $query;
  }
}

?>