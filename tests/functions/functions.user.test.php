



<?php


  require_once('../../app/app.php');
  

  try {
    
    Data::init(new MysqlDataProvider());    
    output(authenticate_user('abdel', 'abdel'), true);
    Data::close();


  } catch(PDOException $e) {
    print($e);
  }

  



?>