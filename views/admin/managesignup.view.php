


<div class="container d-flex flex-column justify-content-center align-content-center">
  <div class="mt-5 text-center">
    <?php if($data['signup']):?>
      <h2 class="text-center text-danger">The sign up is allowed</h2>
      <form method="post" class="">
        <button type="submit" name="disallow" class="btn btn-outline-success px-5 mt-5">Disallow</button>
      </form>
    <?php else:?>
      <h2 class="text-center text-success">The sign up is disallowed</h2>
      <form method="post" class="">
        <button type="submit" name="allow" class="btn btn-outline-danger px-5 mt-5">Allow</button>
      </form>
    <?php endif?>
  </div>



</div>