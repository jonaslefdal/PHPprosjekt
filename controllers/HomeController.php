<?php

class HomeController
{
    // The index method will handle the logic for displaying the homepage
    public function index()
    {
   

        // Include the view and pass the data to it
        require_once '../views/index_view.php';
        
    }

}

// Example of a very simple router to demonstrate usage
if (isset($_GET['page'])) {
    $controller = new HomeController();
    
    switch ($_GET['page']) {
        
        default:
            $controller->index();
            break;
    }
} else {
    // If no page is specified, load the homepage
    $controller = new HomeController();
    $controller->index();
}
?>
