



<?php

  //  working 100%

  require_once('../../app/app.php');
  

  try {
    $db = new MysqlDatabase();    
    // if($db->execute('create table if not exists client (id int, name varchar(255));'));
    $db->execute('insert into client values(:id, :name)', [':id' => 2, ':name' => 'Abdelhaq']);
    // $db->execute('delete from client where id = 1');
    output($db->query('select * from client;'));
    //$db->disconnect();
  } catch(PDOException $e) {
    print($e);
  }

  



?>