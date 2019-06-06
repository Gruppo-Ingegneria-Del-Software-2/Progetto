<?php
  require_once('connection.php');
  require_once('models/session.php');

  // TROVA CHIAVE
  	if ($_GET['query'] == 'get_session_by_key_number'){
	  $session = Session::find_active_key_number($_GET['key_number']);
	  if ($_GET['key_number'] == ''){
		?>
		<div class="alert alert-warning" role="alert">
		Inserisci una chiave
		</div>
		<?php
		  }
		else{
			  if ( $session == NULL ){
			  	?>
			  	<div class="row">
				  	<div class="alert alert-danger col-md-10" role="alert">
				  	Sessione non trovata per chiave <?php echo $_GET['key_number']; ?>
				  	</div>
				  	<?php if($_COOKIE['user_role'] > 1 ){ ?>
				  	<div class="col-md-2">
				  		<a href="?controller=sessions&action=create_session&new_session_id=<?php echo $_GET['key_number']; ?>" class="btn-lg btn btn-primary">Crea nuova</a>
				  	</div>
				  	<?php } ?>
			  	</div>
			  	<?php
			  } else {
			  	?>
			  	<div class="row">
				  	<div class="alert alert-success col-md-10" role="alert">
				  	Sessione trovata per chiave <?php echo $_GET['key_number']; ?>
				  	</div>
				  	<div class="col-md-2">
				  	<a class="btn btn-primary btn-lg" href='?controller=sessions&action=show&id=<?php echo $session->id; ?>'>
				  	Visualizza</a>
				  	</div>
				</div>
			  	<?php
			  }
			}
		}


				
		?>