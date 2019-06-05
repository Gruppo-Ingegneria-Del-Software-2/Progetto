<?php 
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);
	if ($flash && $flash == true){	
?>
<div class="alert alert-success">
  <strong>Operazione eseguita con successo.</strong> <?php echo $message; ?>.
</div>
<?php }; ?>

	<div class="row">
		<div class="col-12">
		<h1>Interessati</h1>
		</div>
		<div class="col-12" style="text-align: right;">
			<a class="btn btn-primary" href='?controller=users&action=create_page'>Nuovo</a>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Cognome</th>
					<th>Tipo Utente</th>
					<th>Azioni</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($users as $user) { ?>
					<tr>
						<td><?php echo $user->name; ?></td>
						<td><?php echo $user->surname; ?></td>
						<td><?php if ( $user->role == 1 ){ echo "Studente";} ; ?>
							<?php if ( $user->role == 2 ){ echo "Insegnante";} ; ?>
							<?php if ( $user->role == 3 ){ echo "Personale interno";} ; ?>
							<?php if ( $user->role == 4 ){ echo "Esterno";} ; ?>
						</td>
						<td>
						<a class="btn btn-sm" href='?controller=users&action=show&id=<?php echo $user->id; ?>'>Visualizza</a>
						<a class="btn btn-danger btn-sm" href='?controller=users&action=index&id=<?php echo $user->id; ?>&remove_id=<?php echo $user->id; ?>'>Elimina</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<hr>
	<span style="display:block; height: 100px;"></span>

	<hr>
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
