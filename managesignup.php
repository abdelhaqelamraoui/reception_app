
<?php


  require_once('app/app.php');
  ensure_admin_is_authenticated();


  load_view('admin/managesignup', ['signup' => is_signup_allowed()]);


  if(is_post()) {
    if(isset($_POST['allow'])) {
      allow_signup();
    } elseif(isset($_POST['disallow'])) {
      disallow_signup();
    }
    redirect('managesignup.php');
  }

?>