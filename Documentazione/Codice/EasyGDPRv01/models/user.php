<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
  class User {
    // we define 13 attributes
    // they are public so that we can access them using $user->author directly
    public $id;
    public $CF;
    public $name;
    public $surname;
    public $nation;
    public $province;
    public $city;
    public $CAP;
    public $street;
    public $house_number;
    public $email;
    public $phone_number;
    public $role;


    public function __construct($id, $CF, $name,
                                $surname, $nation, $province, $city, $CAP, 
                                $street, $house_number, $email, $phone_number, $role) {
      $this->id      = $id;
      $this->CF = $CF;
      $this->name = $name;
      $this->surname = $surname;
      $this->nation = $nation;
      $this->province = $province;
      $this->city = $city;
      $this->CAP = $CAP;
      $this->street = $street;
      $this->house_number = $house_number;
      $this->email  = $email;
      $this->phone_number = $phone_number;
      $this->role = $role;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM users');

      // we create a list of User objects from the database results
      foreach($req->fetchAll() as $user) {
        $list[] = new User($user['id'],  $user['CF'], $user['name'], 
        $user['surname'], $user['nation'], $user['province'], $user['city'],
        $user['CAP'], $user['street'], $user['house_number'], $user['email'], 
        $user['phone_number'], $user['role']);
      }

      return $list;
    }

    public static function delete($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('DELETE FROM users WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM users WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $user = $req->fetch();

      return new User($user['id'], $user['CF'], $user['name'], $user['surname'], $user['nation'], $user['province'], $user['city'],
      $user['CAP'], $user['street'], $user['house_number'], $user['email'],  $user['phone_number'], $user['role']);
    }


    public static function create($CF, $name,
    $surname, $nation, $province, $city, $CAP, 
    $street, $house_number, $email, $phone_number, $role) {
      $db = Db::getInstance();
    //  $password = md5($password);
      // we make sure $id is an integer
      
      $req = $db->prepare('INSERT INTO users (id, CF, name, surname, nation, province, city, CAP, 
      street, house_number, email, phone_number, role) VALUES (NULL, :CF, :name, :surname, :nation, :province, :city, :CAP, 
      :street, :house_number, :email, :phone_number, :role)');
      
      $req->execute(array('CF' => $CF, 'name' => $name, 'surname' => $surname, 'nation' => $nation, 'province' => $province, 'city' => $city, 'CAP' => $CAP, 
      'street' => $street, 'house_number' => $house_number, 'email' => $email, 'phone_number' => $phone_number, 'role' => $role)); 
      
    }
  }
?>