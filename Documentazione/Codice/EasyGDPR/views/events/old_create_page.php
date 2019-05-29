
<h1 style="text-align: center;">Nuovo Evento</h1>
<?php

// MONTHS
$months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

// DEFAULT MONTH/YEAR = TODAY
$unix = strtotime("today");
$monthNow = date("M", $unix);
$yearNow = date("Y", $unix); ?>
<!DOCTYPE html>
<html>
  <head>
    
    <link href="src/theme.css" rel="stylesheet"/> 
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

  <hr>

</html>
<?php 
/*ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true); */
	if ($flash && $flash == true){
?>
<div class="alert alert-success">
  <strong>Operazione eseguita con successo.</strong> <?php echo $message; ?>.
</div> 
<?php }; ?>
<!-- <h1 style="text-align: center;">Nuovo Evento</h1> -->
<h5 style="text-align: left;"> <b> Informazioni agguintive </b> </h5>
<div class="row">
<div class="left">
	<form id="new_event" class="container form-signin" method="get" >
		<input type="hidden" name="controller" value="events">
		<input type="hidden" name="action" value="create_page">

		
		<div class="form-group">
			<label>Data</label>			
			<input class="form-control " type="text" placeholder="Data" aria-label="data" name="date" id="date" required="">
		</div>   
		<div class="form-group">
			<label>Nome</label>
			<input class="form-control " type="text" placeholder="Nome" aria-label="nome" name="name" id="name" required="">
		</div>
		<div class="form-group">
			<label>Dettagli</label>
			<input class="form-control " type="text" placeholder="Dettagli" aria-label="Dettagli" name="details" id="details" required="">
		</div> 
		<div class="form-group">
			<label>Data inizio evento</label>
			<input class="form-control " type="text" placeholder="Data inizio evento" aria-label="Data inizio evento" name="start_event" id="start_event" required="">
		</div>		
		<div class="form-group">
			<label>Scadenza</label>
			<input class="form-control " type="text" placeholder="Scadenza" aria-label="Scadenza" name="deadline" id="deadline" required="">
		</div>
		<div class="form-group">
			<label>Data fine evento</label>
			<input class="form-control " type="text" placeholder="Data fine evento" aria-label="Data fine evento" name="end_event" id="end_event" required="">
		</div>
		<div class="form-group">
			<label for="sel1">Urgenza:</label>
			<select class="operatori" id="sel1" name="urgency">
			  <option value=1>Non urgente</option>
			  <option value=2>Urgente</option>
			  <option value=3>Massima urgenza</option>
			</select>
		</div>
		<div class="form-group">
			<button class="btn btn-primary col-md-12 create_product" type="submit">Crea</button>
			
		</div>
	
    </form>
	</div>
</div>