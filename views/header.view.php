

<div>The header
  <a href="./admin.php">Admin</a>
  <form method="post">
    <button type="submit" name="log-out" id="log-out">Log out</button>
  </form>
</div>
<hr>


<?php
  if(is_post()) {
    if(isset($_POST['log-out'])) {
      destroy_session();
      redirect('index.php');
    }
  }
?>