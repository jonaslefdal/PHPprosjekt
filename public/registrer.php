<?php
// Load database and other configurations
require_once '../config/config.php';

// Load the UserController
require_once '../controllers/UserController.php';

// Instantiate the controller
$controller = new UserController();

// Check if form is submitted (POST request)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->registerUser();  // Handle form submission
} else {
    $controller->showRegistrationForm();  // Show the form
}
