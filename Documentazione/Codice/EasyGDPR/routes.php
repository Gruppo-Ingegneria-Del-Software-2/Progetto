<?php
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);
  function check_cookie(){
    if ($_COOKIE['user_role'] == 0 ) {
      return false;
    } else {
      return true;
    }
  }

  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        require_once('models/user.php');
        $controller = new PagesController();
      break;
      case 'events':
        require_once('models/event.php');
        $controller = new EventsController();
      break;
      case 'users':
        require_once('models/user.php');
        $controller = new UsersController();
      break;
    }

    $controller->{ $action }();
  }

  $controllers = array('pages' => ['home', 'error', 'manual'],

                       'events' => ['index', 'show', 'create_page', 'calendar', 'edit_page'],  
                  
               
                       'users' => ['index', 'show', 'create_page']);


  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      // if ( check_cookie() == true ){
      //   call($controller, $action);
      // } else {
      //   call('pages', 'login');
      // }
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>