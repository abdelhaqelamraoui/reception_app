
<?php


  require_once('app/app.php');
  // ensure_user_is_authenticated();
  //echo APP_PATH;
  
  Data::init(new MysqlDataProvider());
  $data = Data::get_clients();
  Data::close();

  load_view('index', $data);


?>