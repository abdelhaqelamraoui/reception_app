
<?php


  require_once('app/app.php');
  if(is_user_authenticated()) {
    /* 
      Not including admin to give him access to create a new user
    */
    redirect('index.php');
  }

  load_view('signup');

  const NAME_MIN_LENGTH = 4;
  const USERNAME_MIN_LENGTH = 4;
  const PASSWORD_MIN_LENGTH = 4;

  if(is_post()) {
    if(isset($_POST['submit'])) {
      $first_name = capitalize_all(sanitize($_POST['first-name']));
      $last_name = capitalize_all(sanitize($_POST['last-name']));
      $username = $_POST['username'];
      $password = $_POST['password'];
      $confirm = $_POST['confirm'];
      if(strlen($first_name) < NAME_MIN_LENGTH || strlen($last_name) < NAME_MIN_LENGTH
        || strlen($username) < USERNAME_MIN_LENGTH || strlen($password) < PASSWORD_MIN_LENGTH
        || strlen($confirm) < PASSWORD_MIN_LENGTH) {
        // TODO [0] : error handling
      } else {
        if(strcmp($password, $confirm) === 0) {
          try {
            Data::init(new MysqlDataProvider());
            Data::add_new_user($first_name, $last_name, $username, $password);
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