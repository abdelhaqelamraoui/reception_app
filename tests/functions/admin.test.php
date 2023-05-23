



<?php


  require_once('../../app/app.php');
  

  try {
    
    $data = new Data(new MysqlDataProvider());    
    var_dump(authenticate_admin('root', 'root'));
    var_dump(authenticate_admin('roo4t', 'root'));


  } catch(PDOException $e) {
    print($e);
  }

  



?>