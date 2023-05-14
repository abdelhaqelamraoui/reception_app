
<?php

  require_once(APP_PATH.'app/app.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/index.css">
  <title><?=CONFIG['app_name']?></title>
</head>
<body class="container-fluid">
  
  <?php include('header.view.php'); ?>

  <!-- <div id="content-section" class="container-fluid"> -->
    <?php include('views/' . $view_name . '.view.php');?>
  <!-- </div> -->

  <?php include('footer.view.php'); ?>

  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="./assets/js/index.js"></script>

</body>
</html>