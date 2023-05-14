

<div class="container">

  <h1>Remove: <?=$model->name?></h1>

  <div>    
      <h3>Are you sure you want to delete ?</h3>
      <form method="post">
        <button type="submit" name="proceed">Yes</button>
        <button>
          <a href="index.php">Cancel</a>
        </button>
        <input type="hidden" name="client-id" value="<?=$model->id?>">
      </form>
      </form>
  </div>
</div>