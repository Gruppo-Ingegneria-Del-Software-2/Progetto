<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

		<script>
			document.addEventListener('DOMContentLoaded', function() {
				$( "#start_date" ).daterangepicker({
						singleDatePicker: true,
						showDropdowns: true,
						minYear: 1901,
						timePicker: true,
						timePicker24Hour: true,
						locale: {
								format: 'DD/MM/Y H:mm'
						}
				});

				$( "#end_date" ).daterangepicker({
						singleDatePicker: true,
						showDropdowns: true,
						minYear: 1901,
						timePicker: true,
						timePicker24Hour: true,
						locale: {
								format: 'DD/MM/Y H:mm'
						}
				});

				// Initial setup
			//	$('#end_date').data('daterangepicker').setStartDate("<?php echo date('d/m/Y H:i', strtotime("+3 days"));?>");
			//	$('#urgenza').val(3);


				$('#start_date').on('change',function(e){
					if( $('#sel1').val() == 1 ){
						var selected_start = moment($('#start_date').data('daterangepicker').startDate.format('YYYY-MM-DD'))
						var end_date = selected_start.add(3, 'days').format("DD/MM/YYYY");

						$('#end_date').data('daterangepicker').setStartDate(end_date + " "+$('#start_date').data('daterangepicker').startDate.format('H:mm'));
						$('#urgenza').val(3);
					}
				}) 
				
				// On change
				$('#sel1').on('change',function(e){
					var optionSelected = $("option:selected", this);
					var valueSelected = this.value;
					console.log(valueSelected);

					// Comunicazione data breach
					if( valueSelected == 1 ){


						var selected_start = moment($('#start_date').data('daterangepicker').startDate.format('YYYY-MM-DD'))
						var end_date = selected_start.add(3, 'days').format("DD/MM/YYYY");

						$('#end_date').data('daterangepicker').setStartDate(end_date + " "+$('#start_date').data('daterangepicker').startDate.format('H:mm'));
						$('#urgenza').val(3);
					}

					// Cancellazione dati personali || Rettifica dei dati
					if( valueSelected == 2 || valueSelected == 3 ){
						$('#urgenza').val(2);
					}

					// Meeting/Conferenza || Altro
					if( valueSelected == 4 || valueSelected == 5 ){
						$('#urgenza').val(1);
					}
				});
			});
		</script>
  </head>
  <body>
	  <?php if ($flash && $flash == true){
			?>
			<div class="alert alert-success">
				<strong>Operazione eseguita con successo.</strong> <?php echo $message; ?>.
			</div> 
			<?php }; ?>
			<div class="col-12" style="text-align: right;">
			<button class="btn btn-primary"  onclick="history.go(-1);">Indietro </button>
			<!-- <a class="btn btn-primary" href='?controller=events&action=index'>Indietro</a> -->
			</div>
	<h1 style="text-align: center;">Nuovo Evento</h1>

	<form  id="new_event" class="container form-signin" method="get" autocomplete="off">
		<input type="hidden" name="controller" value="events">
		<input type="hidden" name="action" value="create_page">

		
        
		<div class="form-group">
		<label for="sel1">Tipologia:</label>
		<select class="operatori" id="sel1" name="type">
			<option disabled selected value>--</option>
			<option value="1">Comunicazione Data Breach</option>
			<option value="2">Cancellazione dati personali</option>
			<option value="3">Rettifica dei dati</option>
			<option value="4">Meeting/Conferenza</option>
			<option value="5">Altro</option>
		</select>
		</div>


		<div class="form-group">
		<label>Data ed ora inizio evento</label>
		<input class="form-control " value="<?php echo date("d/m/Y H:i");?>" type="text" placeholder="Data inizio evento" aria-label="Data inizio evento" name="start_date" id="start_date" required="">
		</div>		
		<div class="form-group">
		<label>Data ed ora fine evento</label>
		<input class="form-control " value="<?php echo date("d/m/Y H:i");?>" type="text" placeholder="Data fine evento" aria-label="Data fine evento" name="end_date" id="end_date" required="">
		</div>
		
 
		<div class="form-group">
		<label>Titolo</label>
		<input class="form-control " type="text" placeholder="Titolo" aria-label="titolo" name="name" id="name" required="">
		</div>
		<div class="form-group">
		<label>Dettagli</label> 		
		<textarea class="form-control " rows="5" type="text" placeholder="Dettagli" aria-label="Dettagli" name="details" id="details" ></textarea>
		</div> 
		 
		
		
		<div class="form-group">
		<label for="urgenza">Urgenza:</label>
		<select class="operatori" id="urgenza" name="urgency">
			<option value=1>Non urgente</option>
			<option value=2>Urgente</option>
			<option value=3>Massima urgenza</option>
		</select>
		</div>
		
		<div class="form-group">
		
			<button class="btn btn-primary col-md-12 create_product" type="submit" >Crea</button>
		</div>

		
		
		
	</form>

	



	</body> 
	<hr>
	<span style="display:block; height: 50px;"></span>
	<footer> 
		<div class="row">

				<div class="col-md-6">
				<p style="font-size:12px;" > <b> © EXCELSIOR 2019  </b> </p>

				<p> <img style="width:10%" src="src/cropped-logo-png.png"> </p>
				</div>

				<div class="col-md-6">
				<p style="font-size:10px;"> <b> INFO EXCELSIOR  </b> </p>

				<p style="font-size:10px;">Via delle Scienze, 206 - 33100 UD, Italia</p>
				<p style="font-size:10px;">info@excelsior.com</p>		
				<p style="font-size:10px;">tel. 0432 000000</p>
				</div>

		</div>
	</footer>
	<style>
	#calendar {
			max-width: 900px;
			margin: 0 auto;
	}
	</style>
	</html>