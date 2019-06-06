<?php
/* [INIT] */
require "config.php";
require "lib-db.php";
require "lib-calendar.php";
$calLib = new Calendar();
 
/* [AJAX REQUESTS] */
switch ($_POST['req']) {
  default :
    echo "ERR";
    break;

  /* [SHOW CALENDAR] */
  case "list":
    // BASIC CALCULATIONS
    // Start and end of month + number of days in month
    $startMonth = sprintf("01 %s %s", $_POST['month'], $_POST['year']);
    $unix = strtotime($startMonth);
    $daysInMonth = date("t", $unix);
    $endMonth = sprintf("%s %s %s", $daysInMonth, $_POST['month'], $_POST['year']);

    // First and last day of month
    $firstDayOfMonth = date("N", strtotime($startMonth));
    $lastDayOfMonth = date("N", strtotime($endMonth));

    // YYYY-MM date format for later use
    $ym = date("Y-m-", $unix);

    // GET ALL EVENTS FOR SELECTED PERIOD
    $events = $calLib->getRange($ym."01", $ym.$daysInMonth);

    // DRAWING CALCULATION
    // Determine the number of blank squares before start of month
    $squares = [];
    if ($firstDayOfMonth != 7) {
      for ($i=0; $i<$firstDayOfMonth; $i++) {
        $squares[] = "b";
      }
    }

    // Populate the days of the month
    for ($i=1; $i<=$daysInMonth; $i++) {
      $squares[] = $i;
    }

    // Determine the number of blank squares after end of month
    if ($lastDayOfMonth != 6) {
      $blanks = $lastDayOfMonth==7 ? 6 : 6-$lastDayOfMonth;
      for ($i=0; $i<$blanks; $i++) {
        $squares[] = "b";
      }
    }

    // DRAW ?>
    <table id="calendar">
      <tr class="day">
        <td>Dom</td> <td>Lun</td> <td>Mar</td> <td>Mer</td>
        <td>Gio</td> <td>Ven</td> <td>Sab</td>
      </tr>
      <tr><?php
        $total = count($squares);
        for ($i=1; $i<=$total; $i++) {
          $thisDay = $squares[$i-1];
          if ($thisDay=="b") {
            echo "<td class='blank'></td>";
          } else {
            $fullDay = sprintf("%s%02u", $ym, $thisDay);
            printf("<td onclick=\"cal.show('%s')\">%s%s</td>", 
              $fullDay, $thisDay,
              $events[$fullDay] ? "<div class='evt'>" . $events[$fullDay] . "</div>" : ""
            );
          }
          if ($i!=$total && $i%7==0) { echo "</tr><tr>"; }
        }
      ?></tr>
    </table>
    <?php break;

  /* [SHOW EVENT FOR SELECTED DAY] */
  case "show" :
    $evt = $calLib->get($_POST['date']); ?>
    <form onsubmit="return cal.save()">
      <h1><?=$evt==false?"Aggiungi":"Modifica"?> evento</h1>
      <div id="evt-date"><?=$_POST['date']?></div>
      <textarea id="evt-details" required><?=$evt==false?"":$evt?></textarea>
      <input type="button" value="Elimina" onclick="cal.del()"/>
      <input type="submit" value="Salva"/>
    </form>
    <?php break;

  /* [SAVE THE EVENT] */
  case "save" :
    echo $calLib->save($_POST['date'], $_POST['details']) ? "OK" : "ERR" ;
    break;

  /* [DELETE EVENT] */
  case "del" :
    echo $calLib->delete($_POST['date']) ? "OK" : "ERR" ;
    break;
}
?>