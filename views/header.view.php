


<nav class="navbar navbar-expand-lg bg-dark position-fixed top-0 start-0 end-0" id="header">
  <div class="container-fluid ">
    <a class="navbar-brand text-light" href="index.php"><?=CONFIG['app_name']?></a>
    <button class="navbar-toggler border border-1 border-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <div class="toggler-button">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      <?php if(is_admin_authenticated()):?>
        <li class="nav-item">
          <a class="nav-link active link-warning" aria-current="page" href="./admin.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active link-warning" aria-current="page" href="./index.php">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active link-warning" aria-current="page" href="./updatecredentials.php">Update credentials</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active link-warning" aria-current="page" href="./signup.php">Add user</a>
        </li>
      <?php endif?>
          
      </ul>


      <?php if(is_user_authenticated() || is_admin_authenticated()):?>
        <form action="./scripts/header.script.php" method="post">
          <button type="submit" name="log-out" id="log-out" class="btn btn-sm btn-outline-warning">Log out</button>
        </form>
      <?php endif?>
      
    </div>
  </div>
	</nav>
