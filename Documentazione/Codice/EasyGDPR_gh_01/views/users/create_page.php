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
<h1 style="text-align: center;">Nuovo Interessato</h1>
<div class="row">
	<form id="new_user" class="container form-signin" method="get" >
		<input type="hidden" name="controller" value="users">
		<input type="hidden" name="action" value="create_page">

		<div class="form-group">
			<label>Codice Fiscale</label>
			<input class="form-control " type="text" placeholder="Codice Fiscale" aria-label="CF" name="CF" id="CF" required="">
		</div>
		<div class="form-group">
			<label>Nome</label>
			<input class="form-control " type="text" placeholder="Nome" aria-label="Nome" name="name" id="name" required="">
		</div>
		<div class="form-group">
			<label>Cognome</label>
			<input class="form-control " type="text" placeholder="Cognome" aria-label="Cognome" name="surname" id="surname" required="">
		</div>
		<div class="form-group">
			<label>Nazione</label>
			<input class="form-control " type="text" placeholder="Nazione" aria-label="Nation" name="nation" id="nation" required="">
		</div>
		<div class="form-group">
			<label>Provincià</label>
			<input class="form-control " type="text" placeholder="Provincia" aria-label="Province" name="province" id="province" required="">
		</div>
		<div class="form-group">
			<label>Città</label>
			<input class="form-control " type="text" placeholder="Citta" aria-label="City" name="city" id="city" required="">
		</div>
		<div class="form-group">
			<label>CAP</label>
			<input class="form-control " type="text" placeholder="CAP" aria-label="CAP" name="CAP" id="CAP" required="">
		</div>
		<div class="form-group">
			<label>Via</label>
			<input class="form-control " type="text" placeholder="Via" aria-label="Via" name="street" id="street" required="">
		</div>
		<div class="form-group">
			<label>Numero Civico</label>
			<input class="form-control " type="text" placeholder="Numero Civico" aria-label="Numero Civico" name="house_number" id="house_number" required="">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input class="form-control " type="text" placeholder="Email" aria-label="Email" name="email" id="email" required="">
		</div>
		<div class="form-group">
			<label>Telefono</label>
			<input class="form-control " type="text" placeholder="Telefono" aria-label="Telefono" name="phone_number" id="phone_number" required="">
		</div>
		<div class="form-group">
			<label for="sel1">Tipo utente:</label>
			<select class="operatori" id="sel1" name="role">
			  <option value=1>Studente</option>
			  <option value=2>Insegnante</option>
			  <option value=3>Personale interno</option>
			  <option value=4>Esterno</option>
			</select>
		</div>
		<div class="form-group">
			<button class="btn btn-primary col-md-12 create_user" type="submit">Crea</button>
		</div>
	</form>
</div>