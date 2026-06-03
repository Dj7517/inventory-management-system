<?php
require_once 'models/Order.php';
require_once 'models/Product.php';

class OrderController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        $orderModel = new Order();
        $orders = $orderModel->getAll();
        require_once 'views/layout/header.php';
        require_once 'views/orders/index.php';
        require_once 'views/layout/footer.php';
    }

    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        $productModel = new Product();
        $products = $productModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $orderModel = new Order();
            $data = [
                'product_id' => $_POST['product_id'],
                'quantity' => $_POST['quantity'],
                'order_type' => $_POST['order_type']
            ];
            if ($orderModel->create($data)) {
                header("Location: index.php?controller=order&action=index");
                exit();
            }
        }
        require_once 'views/layout/header.php';
        require_once 'views/orders/create.php';
        require_once 'views/layout/footer.php';
    }
}
?>