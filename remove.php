
<?php


  require_once('app/app.php');

  ensure_user_is_authenticated();

  /* 
    GET part for redirection from the index page in order to delete
    a client with an id given in the query string
  */
  if(is_get()) {
    /* 
      The case of id = 0 is not considered here because the databse
      is 1 based indexing.
    */
    $id = intval($_GET['id'] ) ?? false;
    
    if(!$id) {
      // TODO : show an error
      redirect('index.php');
    }
    
    Data::init(new MysqlDataProvider());
    $client = Data::get_client($id);
    Data::close();
    /* 
      In case of the client whose id issued from the query string
      is not in the database switch back to the index page
    */
    if(!$client) {
      // TODO : show an error
      redirect('index.php');
    }

    load_view('remove', $client);
    
  }
  
  /* 
    POST part for the updating form in the same page
  */
  if(is_post()) {
    if(isset($_POST['proceed'])) {
      $id = intval(sanitize($_POST['client-id']));
      var_dump($id);
      Data::init(new MysqlDataProvider());
      if(!Data::delete_client($id)) {
        // TODO : give the user an indication abount issuing deletion
        redirect('error.php?id='.ERROR['remove']);
      }
      Data::close();
      redirect('index.php');
    } 
  }
  
  
?>