

	<div class="col-12">
		<h1>Evento numero: <b><?php echo $event->id; ?></b></h1>
		<div class="col-12" style="text-align: right;">
			<a class="btn btn-primary" href='?controller=events&action=edit_page&id=<?php echo $event->id; ?>'>Modifica</a>
		</div>
	<div class="table-responsive">
		<table class="table table-striped" >
		
			<thead>
			<tbody>
				<tr>
					<th>Nome</th>
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
					<th>Data creazione evento</th>
					<td><?php echo $event->timestamp; ?></td>
					</tr>
					<tr>
					<th>Data inizio evento</th>
					<td><?php echo $event->start_date; ?></td>	
					</tr>
					<tr>
					<th>Data fine evento</th>
					<td><?php echo $event->end_date; ?></td>	
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
					 
					 
				</tr>
			</thead>
				
			</tbody>
		</table>
</div>


<br>
