<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
  class UsersController {
    public function index() {
      $flash = false;
      if (isset($_GET['remove_id'])){
        $product = User::delete($_GET['remove_id']);
        $flash = true;
        $message = 'Utente eliminato correttamente';
      }

      $users = User::all();
      require_once('views/users/index.php');
    }

    public function show() {
      $flash = false;
      // we expect a url of form ?controller=users&action=search_key&key_number=x
      // without an id we just redirect to the error page as we need the user id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right user
      $user = User::find($_GET['id']);
      require_once('views/users/show.php');
    }


    public function create_page() {
      $flash = false;
      

     if ( 
      isset($_GET['name']) && isset($_GET['surname'])
      && isset($_GET['nation']) && isset($_GET['province']) && isset($_GET['city']) 
       && isset($_GET['CAP']) && isset($_GET['street']) && isset($_GET['house_number']) 
        && isset($_GET['email']) && isset($_GET['phone_number']) && isset($_GET['role'])) {
       
        
        $product = User::create($_GET['CF'], $_GET['name'],$_GET['surname'], $_GET['nation'], 
        $_GET['province'], $_GET['city'], $_GET['CAP'], 
        $_GET['street'], $_GET['house_number'], $_GET['email'], $_GET['phone_number'], $_GET['role']);
        $flash = true;
        $message = 'Utente creato correttamente';
        
      }
      require_once('views/users/create_page.php');
    }
  }
?>
