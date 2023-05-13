



<?php

  require_once('app/app.php');
  // TODO : ensure the user is not logged in
  // ensure_user_is_authenticated();

  if(is_get()) {
    $error_id = intval(sanitize($_GET['id']));
    if(!$error_id)
      redirect('index');
    $msg = 'Error';
    $data = [];
    switch ($error_id) {
      case ERROR['db_connection']:
        $msg =  'Cannot connect to data source';
        break;
      case ERROR['add']:
        $msg =  'Adding client has failed';
        break;
      case ERROR['edit']:
        $msg =  'Editing client has failed';
        break;
      case ERROR['remove']:
        $msg =  'Removing client has failed';
        break;
      case ERROR['update']:
        $msg =  'Updating client has failed';
        break;
      
      default:
        $msg = 'Error';
        break;
    }
    $data = ['title' => 'Error', 'message' => $msg];
    load_view('error', $data);
  }


?>



