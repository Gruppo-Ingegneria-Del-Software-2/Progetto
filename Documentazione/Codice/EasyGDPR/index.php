<?php
  ini_set('display_errors', 'On'); // metti on per vedere gli errori

  error_reporting(0); // togli il commento per vedere gli errori 

  require_once('connection.php');

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'home';
  }

  require_once('views/layout.php');
?>