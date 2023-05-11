



<?php

  //  working 100%

  require_once('../../app/app.php');
  

  try {
    
    $data = new Data(new MysqlDataProvider());    
    // output($data::get_client(1));
    // $data::add_client('Salim Salimi');
    // $data::update_client(1, 'Hanane Hanani');
    // output($data::get_clients());
    // $data::delete_client(16);
    // output($data::get_clients());

  } catch(PDOException $e) {
    print($e);
  }

  



?>