
<div class="row">
	<div class="col-12">
		<h1>Utente numero: <b><?php echo $user->id; ?></b></h1>
	  
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>CF</th>
					<th>Nome</th>
					<th>Cognome</th>
					<th>Nazione</th>
					<th>Provincià</th>
					<th>Città</th>
					<th>CAP</th>
					<th>Via</th>
					<th>Numero</th>
					<th>Email</th>
					<th>Telefono</th>
					<th>Tipo Utente</th>
				</tr>
			</thead>
			<tbody>
				
					<tr>
						<td><?php echo $user->CF; ?></td>
						<td><?php echo $user->name; ?></td>
						<td><?php echo $user->surname; ?></td>						
						<td><?php echo $user->nation; ?></td>
						<td><?php echo $user->province; ?></td>
						<td><?php echo $user->city; ?></td>
						<td><?php echo $user->CAP; ?></td>
						<td><?php echo $user->street; ?></td>
						<td><?php echo $user->house_number; ?></td>
						<td><?php echo $user->email; ?></td>
						<td><?php echo $user->phone_number; ?></td>
						<td><?php if ( $user->role == 1 ){ echo "Studente";} ; ?>
							<?php if ( $user->role == 2 ){ echo "Insegnante";} ; ?>
							<?php if ( $user->role == 3 ){ echo "Personale interno";} ; ?>
							<?php if ( $user->role == 4 ){ echo "Esterno";} ; ?>
						</td>
					</tr>
				
			</tbody>
		</table>
</div>
</div>

<br>
