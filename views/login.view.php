


<div class="container-fluid d-flex align-items-center justify-content-center full_height" id="form-container">

  <form method="post" class="login-form p-4 border border-2 rounded">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="text-center">
      <button type="submit" name="log-in" class="btn btn-primary px-4">Log in</button>
    </div>

    <?php if($data['signup']):?>
      <div class="mb-3 text-center mt-4">
        <a href="signup.php" class="link">sign up</a>
      </div>
    <?php endif ?>
  
  </form>

</div>
