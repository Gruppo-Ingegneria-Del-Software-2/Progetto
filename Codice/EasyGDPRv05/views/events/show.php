

	<div class="col-12">
		<h1>Evento: <b><?php echo $event->name; ?></b></h1>
		<div class="col-12" style="text-align: right;">
			<a class="btn btn-primary" href='?controller=events&action=edit_page&id=<?php echo $event->id; ?>'>Modifica</a>
			<button class="btn btn-primary"  onclick="history.go(-1);">Indietro </button>
		</div>
	<div class="table-responsive">
		<table class="table table-striped" >
		
			<thead>
			<tbody>
				<tr>
					<th>Titolo</th>
					<td><?php echo $event->name; ?></td>
				</tr>
				<tr>
					<th>Tipologia</th>
					<td>
							<?php if ( $event->type == 1 ){ echo "Comunicazione Data Breach";} ; ?>
							<?php if ( $event->type == 2 ){ echo "Cancellazione dati";} ; ?>
							<?php if ( $event->type == 3 ){ echo "Rettifica dei dati";} ; ?>
							<?php if ( $event->type == 4 ){ echo "Meeting/Conferenza";} ; ?>
							<?php if ( $event->type == 5 ){ echo "Altro";} ; ?>
							
						</td>
						</tr>
						<tr>
					<th>Data e ora creazione</th>
					<td><?php $time = $event->timestamp; echo substr($time, 0, strlen($time)-3); ?></td>
					</tr>
					<tr>
					<th>Data e ora inizio</th>
					<td><?php $time = $event->start_date; echo substr($time, 0, strlen($time)-3); ?></td>	
					</tr>
					<tr>
					<th>Data e ora fine</th>
					<td><?php $time = $event->end_date; echo substr($time, 0, strlen($time)-3); ?></td>	
					</tr>
					<tr>
					<th>Dettagli</th>
					<td><?php echo $event->details; ?></td>
					</tr>
					<tr>
					<th>Urgenza</th>
					<td><?php if ( $event->urgency == 1 ){ echo "Non urgente";} ; ?>
						<?php if ( $event->urgency == 2 ){ echo "Urgente";} ; ?>
						<?php if ( $event->urgency == 3 ){ echo "Massima urgenza";} ; ?>							
					</td>
					</tr>
					<tr>
					<th>Evento completato</th>
					<td><?php if ( $event->completed == 0 ){ echo "No";} ; ?>
						<?php if ( $event->completed == 1 ){ echo "Sì";} ; ?>
					</td>
					</tr>
					 
					 
				</tr>
			</thead>
				
			</tbody>
		</table>
</div>

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
<br>
