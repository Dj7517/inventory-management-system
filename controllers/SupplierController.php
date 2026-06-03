<?php
require_once 'models/Supplier.php';

class SupplierController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        $supplierModel = new Supplier();
        $suppliers = $supplierModel->getAll();
        require_once 'views/layout/header.php';
        require_once 'views/suppliers/index.php';
        require_once 'views/layout/footer.php';
    }

    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $supplierModel = new Supplier();
            $data = [
                'name' => $_POST['name'],
                'contact' => $_POST['contact'],
                'email' => $_POST['email'],
                'address' => $_POST['address']
            ];
            if ($supplierModel->create($data)) {
                header("Location: index.php?controller=supplier&action=index");
                exit();
            }
        }
        require_once 'views/layout/header.php';
        require_once 'views/suppliers/create.php';
        require_once 'views/layout/footer.php';
    }
}
?>