



<?php


// require_once(APP_PATH.'app/config.php');
require_once(APP_PATH.'app/app.php');
// TODO : protect the scrip from being accessed

function authenticate_admin($username, $password) {

  $username = hash_data($username);
  $password = hash_data($password);

  if(!is_admin_authenticated()) {
    Data::init(new MysqlDataProvider);
    $admin = Data::get_admin();
    Data::close();
    if($admin instanceof Admin) {
      return strcasecmp($admin->username, $username) == 0 && strcasecmp($admin->password, $password) == 0;
    }
  }
  return false;
}

function login_admin($username, $password) {
  if(authenticate_admin($username, $password)) {
    $_SESSION['admin_status'] = 'logged-in';
    return true;
  }
  return false;
}

function log_out_admin() {
  if(is_admin_authenticated()) {
    destroy_session();
    return true;
  }
  return false;
}

function is_admin_authenticated() {
  start_session();
  return isset($_SESSION['admin_status']);
}
  
/**
 * switches to login page if admin is not logged in
 * @return void
 */
function ensure_admin_is_authenticated() {
  if(!is_admin_authenticated()) {
    redirect('login.php');
  }
}


/**
 * allow_signup
 *
 * @return void
 */
function allow_signup() {
  Data::init(new MysqlDataProvider());
  $config = Data::get_config('allow-signup');
  if($config instanceof Config) {
    Data::update_config('allow-signup', 'yes');
  } else {
    Data::add_config('allow-signup', 'yes');
  }
  Data::close();
}


/**
 * disallow_signup
 *
 * @return void
 */
function disallow_signup() {
  Data::init(new MysqlDataProvider());
  $config = Data::get_config('allow-signup');
  if($config instanceof Config) {
    Data::update_config('allow-signup', 'no');
  } else {
    Data::add_config('allow-signup', 'no');
  }
  Data::close();
}




?>