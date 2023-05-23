


<div class="container">
  
  <h1>Edit: <?=$data->name?></h1>

  <?php if(!$data):?>
    <p>The client does not exist</p>
  <?php else: ?>

    <form method="post">
      <div class="input-group">
        <span class="input-group-text"><?=$data->id?></span>
        <input type="text" name="new-name" value="<?=$data->name ?>" class="form-control" pattern="(\w| )+"/>
        <button type="submit" name="update" id="update" class="btn btn-success">Update</button>
        <a href="index.php" class="btn btn-outline-success">Cancel</a>
      </div>
      <input type="hidden" name="client-id" value="<?=$data->id?>"/>
    </form>

<?php endif ?>

</div>