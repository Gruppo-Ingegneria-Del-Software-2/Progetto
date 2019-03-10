<?php
class Calendar extends DB {
  function get($date) {
  // get() : get event for the selected date
  // PARAM $date : date
 
    $sql = "SELECT * FROM `events` WHERE `date`=?";
    $evt = $this->fetch($sql, [$date]);
    return count($evt)==0 ? false : $evt[0]['details'] ;
  }

  function getRange($start, $end) {
  // getRange() : get all events in between selected date range
  // PARAM $start : start date
  //       $end : end date
 
    $sql = "SELECT * FROM `events` WHERE `date` BETWEEN ? AND ?";
    $evt = $this->fetch($sql, [$start, $end], "date", "details");
    return count($evt)==0 ? false : $evt ;
  }

  function save($date, $details) {
  // save() : create/update event on specified date
  // PARAM $date : date
  //       $details : event details
 
    $sql = "REPLACE INTO `events` (`date`, `details`) VALUES (?, ?)";
    return $this->exec($sql, [$date, $details]);
  }

  function delete($date) {
  // delete() : delete event on specified date
  // PARAM $date : date
 
    $sql = "DELETE FROM `events` WHERE `date`=?";
    return $this->exec($sql, [$date]);
  }
}
?>