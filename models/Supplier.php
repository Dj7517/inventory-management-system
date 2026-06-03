<?php
class Supplier {
    private $conn;
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM suppliers ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO suppliers (name, contact, email, address) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['name'], $data['contact'], $data['email'], $data['address']]);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM suppliers WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE suppliers SET name=?, contact=?, email=?, address=? WHERE id=?");
        return $stmt->execute([$data['name'], $data['contact'], $data['email'], $data['address'], $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM suppliers WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>