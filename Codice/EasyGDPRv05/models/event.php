<?php

// ini_set('display_startup_errors', true);
// error_reporting(E_ALL);
// ini_set('display_errors', true);  
  class Event {
    // we define 8 attributes
    // they are public so that we can access them using $event->author directly
    public $name;
    public $id;
    public $type;
    public $timestamp;
    public $details;
    public $urgency;
    public $start_date;
    public $end_date;
    public $completed;
 
    public function __construct($name, $id, $type, $timestamp, $details, $urgency, $start_date, $end_date, $completed) {
      $this->name = $name;
      $this->id      = $id;
      $this->type = $type;
      $this->timestamp = $timestamp;
      $this->details = $details;
      $this->urgency = $urgency;
      $this->start_date = $start_date;
      $this->end_date = $end_date;
      $this->completed = $completed;
      
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM events');

      // we create a list of Event objects from the database results
      foreach($req->fetchAll() as $event) {
        $list[] = new Event($event['name'], $event['id'], $event['type'],  
        $event['timestamp'], $event['details'],
        $event['urgency'], $event['start_date'], $event['end_date'],  $event['completed']);
      }

      return $list;
    }

    public static function all_open() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM events WHERE end_date > CURRENT_TIMESTAMP AND completed = 0');

      // we create a list of Event objects from the database results
      foreach($req->fetchAll() as $event) {
        $list[] = new Event($event['name'], $event['id'], $event['type'],  
        $event['timestamp'], $event['details'],
        $event['urgency'], $event['start_date'], $event['end_date'],  $event['completed']);
      }

      return $list;
    }

    public static function all_open_passed() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM events WHERE end_date < CURRENT_TIMESTAMP AND completed = 0');

      // we create a list of Event objects from the database results
      foreach($req->fetchAll() as $event) {
        $list[] = new Event($event['name'], $event['id'], $event['type'],  
        $event['timestamp'], $event['details'],
        $event['urgency'], $event['start_date'], $event['end_date'],  $event['completed']);
      }

      return $list;
    }

    public static function delete($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('DELETE FROM events WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM events WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $event = $req->fetch();

      return new Event($event['name'], $event['id'], $event['type'],  $event['timestamp'],
                       $event['details'], $event['urgency'], 
                 $event['start_date'],  $event['end_date'], $event['completed']);
    }

    public static function create($name, $type, $details, $urgency, $start_date, $end_date) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      
      $req = $db->prepare('INSERT INTO events (name, id, type, timestamp, details, urgency, start_date,  end_date)
                           VALUES (:name, NUll, :type, CURRENT_TIMESTAMP, :details, :urgency, :start_date,  :end_date)');
      $req->execute(array('name' => $name, 'type' => $type,
                          'details' => $details, 'urgency' => $urgency, 
                          'start_date' => $start_date,  'end_date' => $end_date));      
    }


     public static function edit($id,$name, $type, $details, $urgency, $start_date,  $end_date, $completed) 
     {
       $db = Db::getInstance();
         // we make sure $id is an integer
       $id = intval($id);

       $req = $db->prepare("UPDATE events SET name=:name, 
                                              type=:type, 
                                              details=:details, 
                                              urgency=:urgency, 
                                              start_date=:start_date, 
                                              end_date=:end_date,
                                              completed=:completed WHERE id=:id");


       $req->execute(array('name' => $name, 
                          'type' => $type, 
                          'details' => $details, 
                          'urgency' => $urgency, 
                          'start_date' => $start_date, 
                          'end_date' => $end_date,
                          'id' => $id,
                          'completed'=> $completed));      
     }
}
  
?>