<?php
class Order {
    private $conn;
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT o.*, p.name as product_name FROM orders o JOIN products p ON o.product_id = p.id ORDER BY o.id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO orders (product_id, quantity, order_type) VALUES (?, ?, ?)");
        $stmt->execute([$data['product_id'], $data['quantity'], $data['order_type']]);
        
        $product = new Product();
        $product->updateStock($data['product_id'], $data['quantity'], $data['order_type']);
        return true;
    }
}
?>