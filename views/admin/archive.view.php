

<div class="container">

  <div class="mb-3">
    <a href="./admin.php" class="link">Clients</a>
    <a href="./search.php" class="link">Search</a>
    <span class="badge bg-success text-white">Archive</span>
  </div>

    <table class="table table-striped">

      <thead>
        <tr>
        <th>Number</th>
        <th>ID</th>
        <th>Client ID</th>
        <th>Name</th>          
        <th>Reception date</th>          
        <th>Reception time</th>                
        <th>Last modification</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($model as $index => $archived_client):?>
          <tr>
            <td>[<?=$index?>]</td>
            <td>[<?=$archived_client->id?>]</td>
            <td>[<?=$archived_client->client_id?>]</td>
            <td><?=$archived_client->name?></td>          
            <td><?=$archived_client->reception_date?></td>          
            <td><?=$archived_client->reception_time?></td>          
            <td><?=$archived_client->last_modification?></td>          
          </tr>
        <?php endforeach?>
      </tbody>

    </table>
  
</div>