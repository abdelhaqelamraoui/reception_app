

<?php

  require_once('app/app.php');

  if(is_user_authenticated() || is_admin_authenticated()) {
    redirect('index.php');
  }
 
  load_view('login', ['signup' => is_signup_allowed()]);

  
  if(is_post()) {

    if(isset($_POST['log-in'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

    //   /* 
    //   according to the login, chose to log the user or the admin
    //   */

      if(login_admin($username, $password)) {
          redirect('index.php');
      } elseif(login_user($username, $password)) {
          redirect('index.php');
      } else {
        // TODO [0] : show authentification error
      }
    }
  }


?>

