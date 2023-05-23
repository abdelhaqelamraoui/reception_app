



<?php

  //  working 100%

  require_once('../../app/app.php');
  

  try {
    
    Data::init(new MysqlDataProvider());    
    // output(Data::get_client(5));
    // Data::add_client('Salim Salimi');
    // Data::update_client(1, 'Hanane Hanani');
    // output(Data::get_clients());
    output(Data::delete_client(8), true);
    // Data::delete_client(16);
    // output(Data::get_clients());
    // output(Data::get_admin());
    // output(Data::get_users());
    // output(Data::get_user('abdel'));
    // output(Data::get_user('abdel') instanceof User, true);
    Data::close();

  } catch(PDOException $e) {
    print($e);
  }

  



?>