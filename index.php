
<?php


  require_once('app/app.php');
  ensure_user_is_authenticated();
  
  try {
    Data::init(new MysqlDataProvider());
    $data = Data::get_clients();
    Data::close();
    load_view('index', $data);
  } catch (Exception $e) {
    // TODO : show error indication
    redirect('error.php?id=1');
  }



?>