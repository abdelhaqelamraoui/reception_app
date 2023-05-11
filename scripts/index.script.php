


<?php

require_once('../app/app.php');
// TODO : protect the scrip from being accessed

if(is_post()) {
  if(isset($_POST['ajouter'])) {
    $name = sanitize($_POST['client-name']);
    if($name) {
      Data::init(new MysqlDataProvider());
      if(Data::add_client(capitalize_all($name))) {
        redirect('../index.php');
      }      
    }
  }
}

?>