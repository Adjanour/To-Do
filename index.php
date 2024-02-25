<?php
// if (!isset($_SESSION['user_id'])) {
//     // If the user is logged in, redirect to the home page
//     header('Location: login.php');
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To-Do App</title>
    <link rel="stylesheet" href="style.css"> <!-- Assuming you have a CSS file -->
</head>
<body>
    <?php include './components/navbar.php'; ?> <!-- Include the navigation bar -->
    
    <div class="content">
    <?php
        // Load different PHP files based on the requested page
        $page = isset($_GET['page']) ? $_GET['page'] : 'index';
        if ($page == 'tasks') {
            include './pages/task/TaskListPage.php';
        } elseif ($page == 'tasks/create') {
            include './pages/task/TaskCRUDPage.php';
        } elseif ($page == 'about') {
            include './pages/gen/AboutPage.php';
        }elseif ($page == 'contacts') {
            include './pages/gen/ContactsPage.php';
        }elseif($page == 'home'){
            include './pages/auth/LoginPage.php';
        }
        else{

        }
        ?>
    </div>
    <?php include './components/footer.php'; ?> 
    
    <script src="script.js"></script> 
</body>
</html>
