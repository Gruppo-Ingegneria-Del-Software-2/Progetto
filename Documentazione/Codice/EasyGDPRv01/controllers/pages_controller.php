<?php
  class PagesController {
    public function home() {
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }

    public function search_events() {
      require_once('views/pages/search_events.php');
    }

    public function manual() {
      require_once('views/pages/manual.php');
    }

    public function contatto() {
      require_once('views/pages/contatto.php');
    }



    /* USARE SE IL LOGIN E' NECESSARIO */

/*    public function login() {
      if( $_POST['email'] != "" ){
        $flash = 'failed';
        $db = Db::getInstance();
        // we make sure $id is an integer
        $password = md5($_POST['password']);
        $req = $db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('email' => $_POST['email'], 'password' => $password));
        $user = $req->fetch();

        if ($user['role'] != ""){
          $message = "Accesso eseguito correttamente";
          $flash = 'success';
        } else {
          $message = "Username e password errati";
          $flash = 'failed';
        }
      }

      if( $_POST['forgot_email'] != "" && $_POST['code'] != "" && $_POST['password'] != "" ){
        $flash = 'failed';
        $db = Db::getInstance();
        // we make sure $id is an integer
        $password = md5($_POST['password']);
        $req = $db->prepare('SELECT * FROM users WHERE email = :email AND reset_code = :reset_code');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('email' => $_POST['forgot_email'], 'reset_code' => $_POST['code']));
        $user = $req->fetch();

        if ($user['id'] == ""){
          $message = "Email di recupero inviata";
        } else {
          $db = Db::getInstance();
          $req = $db->prepare('UPDATE users SET users.password = :password WHERE users.id = :session_id');
          $req->execute(array('password' => $password, 'session_id' => $user['id']));  
          $message = "Password reimpostata";
          $flash = 'success_wait';
        }
      }

      if( $_POST['forgot_email'] != "" && $_POST['code'] == "" ){
        $flash = 'failed';
        $db = Db::getInstance();
        // we make sure $id is an integer
        $req = $db->prepare('SELECT * FROM users WHERE email = :email');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('email' => $_POST['forgot_email']));
        $user = $req->fetch();

        if ($user['id'] != ""){
          $message = "Email di recupero inviata";
          $flash = 'success_wait';

          $cryptoStrong = true; // can be false
          $length = 4; // Any length you want
          $bytes = openssl_random_pseudo_bytes($length, $cryptoStrong);
          $randomString = bin2hex($bytes);

          $db = Db::getInstance();
          $req = $db->prepare('UPDATE users SET users.reset_code = :reset_code WHERE users.id = :session_id');
          $req->execute(array('reset_code' => $randomString, 'session_id' => $user['id']));  

          require 'PHPMailerAutoload.php';

          $mail = new PHPMailer;
          $reset_code = $randomString;
          $email = $_POST['forgot_email'];


          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'srv-hp10.netsons.net';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = '##################';                 // SMTP username
          $mail->Password = '##################';                           // SMTP password
          $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 465;                                    // TCP port to connect to

          $mail->setFrom('##################', 'Assistenza DarkHouse');
          $mail->addAddress($email);     // Add a recipient

          $mail->isHTML(true);                                  // Set email format to HTML

          $mail->Subject = 'Reset Password';
          $mail->Body    = "Il tuo codice di recupero: '".$reset_code."' inseriscilo senza le virgolette nello Step 2.";
          $mail->AltBody = "Il tuo codice di recupero: '".$reset_code."' inseriscilo senza le virgolette nello Step 2.";

          if(!$mail->send()) {
              echo 'Message could not be sent.';
              echo 'Mailer Error: ' . $mail->ErrorInfo;
          } else {
              echo 'true';
          }

        } else {
          $message = "Indirizzo email non trovato";
          $flash = 'failed';
        }
      } 
    
      require_once('views/pages/login.php');
    } */


  }
?>