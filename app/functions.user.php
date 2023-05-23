

<?php


require_once(APP_PATH.'app/config.php');
// TODO : protect the scrip from being accessed

/**
 * authenticate_user
 *
 * @param  mixed $username
 * @param  mixed $password
 * @return void
 */
function authenticate_user($username, $password) {
  
  if(!is_user_authenticated()) {
    Data::init(new MysqlDataProvider);
    $user = Data::get_user($username);
    
    Data::close();
    if($user) {
      return strcasecmp($user->username, hash_data($username)) == 0 
          && strcasecmp($user->password, hash_data($password)) == 0;
    }
  }
  return false;
}

/**
 * is_user_authenticated
 *
 * @return void
 */
function is_user_authenticated() {
  start_session();
  return isset($_SESSION['user_status']);
}

/**
 * login_user
 *
 * @param  mixed $username
 * @param  mixed $password
 * @return void
 */
function login_user($username, $password) {
  if(authenticate_user($username, $password)) {
    $_SESSION['user_status'] = 'logged-in';
    return true;
  }
  return false;
}

/**
 * log_out_user
 *
 * @return void
 */
function log_out_user() {
  if(is_user_authenticated()) {
    destroy_session();
    return true;
  }
  return false;
}
  
/**
 * switches to login page if user is not logged in
 * @return void
 */
function ensure_user_is_authenticated() {
  if(!is_user_authenticated()) {
    redirect('login.php');
  }
}


/**
 * is_signup_allowed
 *
 * @return bool
 */
function is_signup_allowed() {
  Data::init(new MysqlDataProvider());
  $config = Data::get_config('allow-signup');
  Data::close();
  if($config) {
    return $config->cvalue === 'yes';
  }
  return false;
}



?>