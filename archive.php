


<?php

  
require_once('app/app.php');

ensure_admin_is_authenticated();

if(is_get()) {
  Data::init(new MysqlDataProvider());
  $data = Data::get_archived_clients();
  Data::close();
  load_view('admin/archive', $data);
}

?>