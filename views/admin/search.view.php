
<div class="container">

  <div  class="mb-3">
    <a href="./admin.php" class="link">Clients</a>
    <span class="badge bg-success text-white">Search</span>
    <a href="./archive.php" class="link">Archive</a>
  </div>

  <form method="post" id="search-form" class="col input-group">
        <input type="search" name="search-name" id="search-name" class="form-control">
        <button type="submit" name="search" class="btn btn-sm btn-primary px-3">Search</button>
  </form>
  
  <?php if(!empty($model)): ?>
    <table class="table table-striped">

    <thead>
      <tr>
      <th>Number</th>
      <th>Client ID</th>
      <th>Name</th>          
      <th>Reception date</th>          
      <th>Reception time</th>          
      </tr>
    </thead>

    <tbody>
      <?php foreach($model as $index => $client):?>
        <tr>
          <td>[<?=$index?>]</td>
          <td>[<?=$client->id?>]</td>
          <td><?=$client->name?></td>          
          <td><?=$client->reception_date?></td>          
          <td><?=$client->reception_time?></td>              
        </tr>
      <?php endforeach?>
    </tbody>

    </table>
<?php endif ?>

</div>