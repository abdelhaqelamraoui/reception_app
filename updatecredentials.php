
<?php


  require_once('app/app.php');
  ensure_admin_is_authenticated();

  load_view('admin/updatecredentials');


  const USERNAME_MIN_LENGTH = 4;
  const PASSWORD_MIN_LENGTH = 4;

  if(is_post()) {
    if(isset($_POST['update'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $confirm = $_POST['confirm'];

      if(strlen($username) < USERNAME_MIN_LENGTH || strlen($password) < PASSWORD_MIN_LENGTH
        || strlen($confirm) < PASSWORD_MIN_LENGTH) {
        // TODO [0] : error handling
      } else {
        if(strcmp($password, $confirm) === 0) {
          try {
            Data::init(new MysqlDataProvider());
            if(Data::update_admin(hash_data($username), hash_data($password))) {
              alert('Credentials have been updated');
              log_out_admin();
              redirect('login.php');
              // TODO [0] : fix : when using the redirect, the alert does not pop up !
            }
            Data::close();
          } catch (Exception $e) {
            // TODO [0] : error handling
            alert('error');
          }
        }
      }
    }
  }

?>