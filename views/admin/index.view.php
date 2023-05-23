

<div class="container">

  <div class="mb-3">

    <span class="col-8">
      <span class="badge bg-success text-white">Clients</span>
      <a href="./search.php" class="link">Search</a>
      <a href="./archive.php" class="link">Archive</a>
    </span>


  </div>

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
          <td>[<?=$index + 1?>]</td>
          <td>[<?=$client->id?>]</td>
          <td><?=$client->name?></td>          
          <td><?=$client->reception_date?></td>          
          <td><?=$client->reception_time?></td>              
        </tr>
      <?php endforeach?>
    </tbody>

  </table>

</div>