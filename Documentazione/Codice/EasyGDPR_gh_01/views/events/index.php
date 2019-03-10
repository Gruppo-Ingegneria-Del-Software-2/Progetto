<?php
// MONTHS
$months = ["Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic"];

// DEFAULT MONTH/YEAR = TODAY
$unix = strtotime("today");
$monthNow = date("M", $unix);
$yearNow = date("Y", $unix); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Calendario</title>   <!-- AGGIUNGERE TITLE PURE NELLE ALTRE PAGINE -->
    <link href="src/theme.css" rel="stylesheet">
    <script src="src/calendar.js"></script>
  </head>
  <body>
    <!-- [DATE SELECTOR] -->
    <div id="selector">
      <select id="month"><?php
        foreach ($months as $m) {
          printf("<option %svalue='%s'>%s</option>", 
            $m==$monthNow ? "selected='selected' " : "", $m, $m
          );
        }
      ?></select>
      <select id="year"><?php
        // 10 years range - change if not enough for you
        for ($y=$yearNow-10; $y<=$yearNow+10; $y++) {
          printf("<option %svalue='%s'>%s</option>",
            $y==$yearNow ? "selected='selected' " : "", $y, $y
          );
        }
      ?></select>
      <input type="button" value="IMPOSTA" onclick="cal.list()"/>
    </div>

    <!-- [CALENDAR] -->
    <div id="container"></div>

    <!-- [EVENT] -->
    <div id="event"></div>
  </body>
</html>