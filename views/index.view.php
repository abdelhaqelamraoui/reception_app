

<div class="container">

  <h3 class="">Clients</h3>

  <div>

    <table class="table table-striped">
      <thead>
        <tr>
        <th>Number</th>
        <th>Client ID</th>
        <th>Name</th>                 
        </tr>
      </thead>
      <tbody>
      <?php foreach($model as $index => $client):?>
        <tr>
          <td>[<?=$index + 1?>]</td>
          <td>[<?=$client->id?>]</td>
          <td><?=$client->name?></td> 
          <td><a href="edit.php?id=<?=$client->id?>" class="link">Edit</a></td>
          <td><a href="remove.php?id=<?=$client->id?>" class="link link-danger">Remove</a></td>                   
      </tr>
      <?php endforeach?>
      </tbody>
    </table>

    
    <div>
      <form action="./scripts/index.script.php" method="post" >
        <div class="input-group">
          <input type="text" name="client-name" placeholder="Karim El Karimi" class="form-control" pattern="(\w| )+">
          <button type="submit" name="ajouter" class="btn btn-success">Ajouter</button>
        </div>
      </form>
    </div>

  </div>
</div>