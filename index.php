<?php
require_once './views/includes/header.php';
require_once './autoload.php';
require_once './controllers/HomeController.php';
$home = new HomeController();
$pages=['home'];
    if(isset($_GET['page'])){
        $home->index($_GET['page']);
    }else
    {
        $home->index('home');
    }
require_once './views/includes/footer.php';
?>


