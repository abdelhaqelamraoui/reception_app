



<?php

  //  working 100%

  require_once('../../app/app.php');
  

  try {
    $mdp = new MysqlDataProvider();    
    // output($mdp->get_client(1));
    // $mdp->add_client('Rachi Rachidi');
    // $mdp->update_client(1, 'Hanane Chakiri');
    // $mdp->delete_client(2);
    // output($mdp->get_clients());
    // output($mdp->get_last_client());
     output($mdp->search_client('Sa'));

  } catch(PDOException $e) {
    print($e);
  }

  



?>