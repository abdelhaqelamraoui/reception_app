
<?php


  require_once('app/app.php');
  // TODO: ensure user is authenticated
  // ensure_user_is_authenticated();
 
  
  /* 
    case of a get request sent by the index page for updating
    a client. Get the id an perforn the action if the second
    action is a post one sent by the edit.view.
  */


  if(is_get()) {
    $id = intval($_GET['id'] ) ?? false;
    if(!$id) {
      // TODO : show an error
      redirect('index.php');
    }
    Data::init(new MysqlDataProvider());
    $client = Data::get_client($id);
    Data::close();
    if(!$client) {
      // TODO: show an error
    } else {
      load_view('edit', $client);
    }
  }
  

  if(is_post()) {
    /* 
      The script will be executed entirely for a POST or for a GET
      Therefore the gotten id issued from the query string is lost
      when the request is POST. Hence we put it in a hidden field
      in the wiew so we can get it back for the update.
    */
    if(isset($_POST['update'])) {
      $id = intval(sanitize($_POST['client-id']));
      if($id) {
        $new_name = sanitize($_POST['new-name']);
        if($new_name) {
          Data::init(new MysqlDataProvider());
          if(Data::update_client($id, capitalize_all($new_name))) {
            // TODO : show an indication of updating succeded
            redirect('index.php');
          } else {
            // TODO : show an error
            // output('Error updating client');
          }
          Data::close();
        }
      }
    } elseif(isset($_POST['cancel'])) {
      // TODO : show an indicaton about canceling
      redirect('index.php');
    }
  }




?>