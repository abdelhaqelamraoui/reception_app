

<h1>Edit: <?=$model->name?></h1>

<div>
  <?php if(!$model):?>
    <p>The client does not exist</p>
  <?php else: ?>
    <form method="post">
      <span><?=$model->id?></span>
      <input type="text" name="new-name" value="<?=$model->name ?>"/>
      <button type="submit" name="update" id="update">Update</button>
      <button type="submit" name="cancel" id="cancel">Cancel</button>
      <input type="hidden" name="client-id" value="<?=$model->id?>"/>
    </form>
<?php endif ?>

</div>