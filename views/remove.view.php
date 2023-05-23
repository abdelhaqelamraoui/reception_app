

<div class="container-fluid d-flex flex-column align-items-center" id="form-container">

  <h1 class="mt-5">Remove: <?=$data->name?></h1>

  <div class="">    
      <form method="post" class="d-flex gap-5 mt-4">
        <button type="submit" name="proceed" class="btn btn-outline-danger px-4">Yes</button>
          <a href="index.php" class="btn btn-success px-3">Cancel</a>
        <input type="hidden" name="client-id" value="<?=$data->id?>">
      </form>
      </form>
  </div>
</div>