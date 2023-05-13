



<?php


require_once(APP_PATH.'app/config.php');
// TODO : protect the scrip from being accessed

function authenticate_admin($username, $password) {
  // TODO [0] : hash them
  if(!is_admin_authenticated()) {
    $admin = CONFIG['admin'];
    if(!isset($admin[$username])) {
      return false;
    } else {
      return $password === $admin[$username];
    }
  }
  }

function login_admin($username, $password) {
  if(authenticate_admin($username, $password)) {
    $_SESSION['admin_status'] = 'logged-in';
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







?>