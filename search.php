



<?php


  require_once('app/app.php');
  ensure_user_is_authenticated();


  $search_clients = null;
  
  if(is_post()) {
    if(isset($_POST['search'])) {
      $name = sanitize($_POST['search-name']);
      if($name) {
        Data::init(new MysqlDataProvider());
        $search_clients = Data::search_client($name);
        Data::close();
      }
    }
  }
  
  load_view('admin/search', $search_clients);


?>