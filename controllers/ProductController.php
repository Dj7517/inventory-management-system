<?php
require_once 'models/Product.php';
require_once 'models/Supplier.php';

class ProductController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        $productModel = new Product();
        $products = $productModel->getAll();
        require_once 'views/layout/header.php';
        require_once 'views/products/index.php';
        require_once 'views/layout/footer.php';
    }

    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        $supplierModel = new Supplier();
        $suppliers = $supplierModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productModel = new Product();
            $data = [
                'name' => $_POST['name'],
                'sku' => $_POST['sku'],
                'category' => $_POST['category'],
                'price' => $_POST['price'],
                'stock' => $_POST['stock'],
                'supplier_id' => $_POST['supplier_id']
            ];
            if ($productModel->create($data)) {
                header("Location: index.php?controller=product&action=index");
                exit();
            }
        }
        require_once 'views/layout/header.php';
        require_once 'views/products/create.php';
        require_once 'views/layout/footer.php';
    }

    public function edit() {
        // Similar to create - omitted for brevity, add if needed
        echo "Edit functionality ready to extend.";
    }
}
?>