<?php

require_once('../models/Product.php');
require_once('GenericDAO.php');

class ProductDAO extends GenericDAO {

  public function adicionar($product) {
    $sql = 'INSERT INTO product (name, description, category, price, amount) VALUES(?,?,?,?,?)';
    $this->create($sql, Array($product->getName(), $product->getDescription(), $product->getCategory(), $product->getPrice(), $product->getAmount()));
  }

  public function alterar($product) {
    $sql = 'UPDATE product SET name=?, description=?, category=?, price=?, amount=?, updatedAt=now() where id=?';
    $this->update($sql, Array($product->getName(), $product->getDescription(), $product->getCategory(), $product->getPrice(), $product->getAmount(), $product->getId()));
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

  public function selecionarPeloId($id) {
    $sql = 'SELECT * FROM product WHERE id = ?';
    $query = $this->read($sql, Array($id));
    return $query;
  }

  public function count($category) {
    $sql = 'SELECT sum(amount) FROM product WHERE category = ?';
    $query = $this->read($sql, Array($category));
    return $query;
  }

  public function removerUnidades($id, $amount) {
    $sql = 'UPDATE product SET amount=?, updatedAt=now() where id=?';
    $prod = $this->selecionarPeloId($id);
    if ($prod[0]['amount'] <= $amount) {
      $this->remover($id);
    } else {
      $this->update($sql, Array($amount, $id));
    }
  }
}
