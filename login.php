

<?php

  require_once('app/app.php');

  if(is_user_authenticated()) {
    redirect('index.php');
  }

  load_view('login');

  
  if(is_post()) {

    if(isset($_POST['log-in'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

    //   /* 
    //   according to the login, chose to log the user or the admin
    //   */
      // alert(CONFIG['admin'][$username]);
      if(isset(CONFIG['admin'][$username])) {
        if(login_admin($username, $password)) {
          // var_dump(is_admin_authenticated());
          redirect('index.php');
        } else {
          // TODO [0] : show error password 
        }
      } elseif(isset(CONFIG['users'][$username])) {
        if(login_user($username, $password)) {
          redirect('index.php');
        } else {
          // TODO [0] : show error password 
        }
      } else {
        // TODO [0] : show authentification error
      }
    }
  }


?>

