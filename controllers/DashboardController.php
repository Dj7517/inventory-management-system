<?php
class DashboardController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
        require_once 'views/layout/header.php';
        require_once 'views/dashboard/index.php';
        require_once 'views/layout/footer.php';
    }
}
?>