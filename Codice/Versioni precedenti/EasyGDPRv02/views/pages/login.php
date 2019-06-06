  <?php 
  	if ($flash == 'success'){
  ?>
  <div class="alert alert-success">
    <strong>Operazione eseguita con successo.</strong> <?php echo $message; ?>.
    <script type="text/javascript">
        document.cookie = "user_role="+"<?php echo $user['role'];?>; expires=Fri, 31 Dec 9999 23:59:59 GMT";
        document.cookie = "user_name="+"<?php echo $user['username'];?>; expires=Fri, 31 Dec 9999 23:59:59 GMT";
        window.location.href = '?controller=sessions&action=index';
    </script>
  </div>
  <?php }; ?>


  <?php 
    if ($_GET['logout'] == 'true'){
  ?>
   <script type="text/javascript">
     setTimeout(function() {
      var cookies = document.cookie.split(";");

      for (var i = 0; i < cookies.length; i++) {
          var cookie = cookies[i];
          var eqPos = cookie.indexOf("=");
          var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
          document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
      }
      window.location.href = '?controller=sessions&action=index';
     }, 500);
   </script>
  <?php }; ?>


  <?php 
  	if ($flash == 'failed'){
  ?>
  <div class="alert alert-danger">
    <strong>Operazione fallita.</strong> <?php echo $message; ?>.
  </div>
  <?php }; ?>
  <?php 
    if ($flash == 'success_wait'){
  ?>
  <div class="alert alert-success">
    <strong>Operazione eseguita.</strong> <?php echo $message; ?>.
  </div>
  <?php }; ?>

  <div class="container">
    <form class="form-signin" method="post">       
      <h2 class="form-signin-heading">Accedi</h2>
      <br>
      <input type="hidden" name="controller" value="pages">
      <input type="hidden" name="action" value="login">

      <input type="text" class="form-control" name="email" placeholder="Indirizzo Email" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
      <a href="#" class="forgot-pass-toggle">Password dimenticata</a>
    </form>

    <div class="forgot-pass" style="display: none;">
      <form class="form-signin" method="post">       
        <input type="hidden" name="controller" value="pages">
        <input type="hidden" name="action" value="login">
        <input type="text" class="form-control" name="forgot_email" placeholder="Indirizzo Email" required="" autofocus="" />
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>   
        <a href="#" class="step-2-toggle">Step 2</a>
      </form>
    </div>

    <div class="step-2" style="display: none;">
      <form class="form-signin" method="post">       
        <input type="hidden" name="controller" value="pages">
        <input type="hidden" name="action" value="login">
        <input type="text" class="form-control" name="forgot_email" placeholder="Indirizzo Email" required="" autofocus="" />
        <input type="text" class="form-control" name="code" placeholder="Codice segreto" required="" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Nuova Password" required="" autofocus="" />
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>   
        <a href="#" class="forgot-pass-toggle">Step 2</a>
      </form>
    </div>
  </div>