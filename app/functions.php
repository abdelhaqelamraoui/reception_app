

<?php

  require_once(APP_PATH.'app/config.php');
  // TODO : protect the scrip from being accessed
  
  /**
   * loads a view to the layout
   * @param  string $view_name e.g.: 'index'
   * @param  mixed $model data to use in the view
   */
  function load_view(string $view_name, $model='') {
    require(APP_PATH . "/views/layout.view.php");
  }
  
  /**
   * sebds a raw HTTP header to change Location to the given URL
   */
  function redirect(string $url) {
    header("Location: $url");
    die();
  }
  
  /**
   * @return true if the request method is POST, else `false`
   */
  function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
  }  

   /**
   * @return true if the request method is GET, else `false`
   */
  function is_get() {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
  }
  
  /**
   * trims a value and filters special chars
   */
  function sanitize(string $value) {
    $temp = filter_var(trim($value),FILTER_SANITIZE_SPECIAL_CHARS);
    return ($temp === false)? '' : $temp;
  }

  function output($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
  }
  
  /**
   * alert a value with Javascript `alert()` method
   * @param mixed $value
   * @param bool $arr `true` if the value is an array
   */
  function alert($value, bool $arr = false) {
    $str = '';
    if($arr) {
      foreach($value as $k => $v)
        $str .= "$k: $v\n";
    } else
      $str = $value;
    echo "<script>alert('$str')</script>";
    
  }




  // function authenticate_user($email, $password) {
  //   $users = CONFIG['users'];
  //   if(!isset($users[$email])) {
  //     return false;
  //   }

  //   $user_password = $users[$email];

  //   return $password === $user_password;
  // }

  function is_user_authenticated() {
    return isset($_SESSION['status']);
  }
    
  /**
   * switches to login page if user is not logged in
   * @return void
   */
  function ensure_user_is_authenticated() {
    if(!is_user_authenticated()) {
      redirect('../login.php');
    }
  }
  
  /**
   * capitalizes all the words of a string
   */
  function capitalize_all(string $str, string $sep = ' ') : string {
    return implode($sep, array_map('ucfirst' , explode($sep, $str)));
  }
  

?>