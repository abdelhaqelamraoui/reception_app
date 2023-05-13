

<?php


require_once(APP_PATH.'app/config.php');
// TODO : protect the scrip from being accessed

function authenticate_user($username, $password) {
  // TODO [0] : hash them

    $users = CONFIG['users'];
    if(!isset($users[$username])) {
      return false;
    }
    return $password === $users[$username];
  }

function is_user_authenticated() {
  start_session();
  return isset($_SESSION['user_status']) || is_admin_authenticated();
}

function login_user($username, $password) {
  if(authenticate_user($username, $password)) {
    $_SESSION['user_status'] = 'logged-in';
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




?>