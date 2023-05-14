


<div class="container">
  
  <h1>Edit: <?=$model->name?></h1>

  <?php if(!$model):?>
    <p>The client does not exist</p>
  <?php else: ?>

    <form method="post">
      <div class="input-group">
        <span class="input-group-text"><?=$model->id?></span>
        <input type="text" name="new-name" value="<?=$model->name ?>" class="form-control"/>
        <button type="submit" name="update" id="update" class="btn btn-success">Update</button>
        <a href="index.php" class="btn btn-outline-success">Cancel</a>
      </div>
      <input type="hidden" name="client-id" value="<?=$model->id?>"/>
    </form>

<?php endif ?>

</div>