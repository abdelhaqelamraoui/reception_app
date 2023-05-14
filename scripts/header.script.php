
<?php

require_once('../app/app.php');
// TODO : protect the scrip from being accessed

if(is_post()) {
  if(isset($_POST['log-out'])) {
    destroy_session();
    redirect('../index.php');
  }
}

?>