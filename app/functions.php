

<?php

  require_once(APP_PATH.'app/config.php');
  // TODO : protect the scrip from being accessed
  
  /**
   * loads a view to the layout
   * @param  string $view_name e.g.: 'index'
   * @param  mixed $data data to use in the view
   */
  function load_view(string $view_name, $data='') {
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

  function output($value, $dump = false) {
    echo '<pre>';
    $dump ? var_dump($value) : print_r($value);
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

  
  /**
   * capitalizes all the words of a string
   */
  function capitalize_all(string $str, string $sep = ' ') : string {
    return implode($sep, array_map('ucfirst' , explode($sep, $str)));
  }
  

  function start_session() {
    if(session_status() === PHP_SESSION_NONE) {
      return session_start();
    }
    return true; // there is an active session
  }

  function destroy_session() {
    if(start_session()) {
      session_unset();
      session_destroy();
    }
  }

  function hash_data($data) {
    return hash('sha256', $data);
  }
  
  function encrypt_data($data, $key) {
    $cipher = 'aes-128-gcm';
    // if (in_array($cipher, openssl_get_cipher_methods())) {
      // need to store these for decryption
      // TODO [0] store this vars in order to use them in decryption
      // $ivlen = openssl_cipher_iv_length($cipher);
      // $iv = openssl_random_pseudo_bytes($ivlen);
      // return openssl_encrypt($data, $cipher, $key, $options=0, $iv, $tag);
      // return openssl_encrypt($data, $cipher, $key);
    // }
    // return false;
    return $data;
  }
  
    function decrypt_data($data, $key) {
      $cipher = 'aes-128-gcm';
      // if (in_array($cipher, openssl_get_cipher_methods())) {
      //   // need to use the stored ones in the encryption
      //   // return openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv, $tag);
      //   return openssl_decrypt($data, $cipher, $key);
      // }
      // return false;
      return $data;
    }

  function ensure_user_or_admin_authenticated() {
    if(! (is_admin_authenticated() || is_user_authenticated()) ) {
      redirect('login.php');
    }
  }
  
?>
