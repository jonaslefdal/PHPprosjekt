<?php
// Load configurations
require_once '../config/config.php';

// Load router or controller
require_once '../controllers/HomeController.php';

$controller = new HomeController();
$controller->index();
?>

