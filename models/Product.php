<?php
class Product {
    private $conn;
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT p.*, s.name as supplier_name FROM products p LEFT JOIN suppliers s ON p.supplier_id = s.id ORDER BY p.id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO products (name, sku, category, price, stock, supplier_id) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$data['name'], $data['sku'], $data['category'], $data['price'], $data['stock'], $data['supplier_id']]);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE products SET name=?, sku=?, category=?, price=?, stock=?, supplier_id=? WHERE id=?");
        return $stmt->execute([$data['name'], $data['sku'], $data['category'], $data['price'], $data['stock'], $data['supplier_id'], $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function updateStock($id, $quantity, $type) {
        $stmt = $this->conn->prepare("UPDATE products SET stock = stock + ? WHERE id = ?");
        $qty = ($type == 'in') ? $quantity : -$quantity;
        return $stmt->execute([$qty, $id]);
    }
}
?>