

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

</div>