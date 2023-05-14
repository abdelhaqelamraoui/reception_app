

<div class="container">

  <h3 class="">Admin
    <a href="./admin.php" class="link fs-5">[Clients]</a>
    <a href="./archive.php" class="link fs-5">[Archive]</a>
  </h3>

    <table class="table table-striped">

      <thead>
        <tr>
        <th>Number</th>
        <th>Client ID</th>
        <th>Name</th>          
        <th>Reception date</th>          
        <th>Reception time</th>          
        <th>Old name</th>          
        <th>Last modification</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($model as $index => $archived_client):?>
          <tr>
            <td>[<?=$index?>]</td>
            <td>[<?=$archived_client->id?>]</td>
            <td><?=$archived_client->name?></td>          
            <td><?=$archived_client->reception_date?></td>          
            <td><?=$archived_client->reception_time?></td>          
            <td><?=$archived_client->old_name?></td>          
            <td><?=$archived_client->last_modification?></td>          
          </tr>
        <?php endforeach?>
      </tbody>

    </table>
  
</div>