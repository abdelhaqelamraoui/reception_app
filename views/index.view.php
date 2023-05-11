

<div>

  <h1>Les clients</h1>

  <div>

    <ol>
      <?php foreach($model as $index => $client):?>
        <li>
          <!-- <--span>< ?=$client->id?></span> -->
          <span><?=$client->name?></span>
          <span><a href="edit.php?id=<?=$client->id?>">Edit</a></span>
          <span><a href="remove.php?id=<?=$client->id?>">Remove</a></span>
        </li>
      <?php endforeach?>
     
    </ol>

    
    <div>
      <form action="./scripts/index.script.php" method="post" >
        <input type="text" name="client-name" placeholder="Karim El Karimi">
        <button type="submit" name="ajouter">Ajouter</button>
      </form>
  </div>

  </div>
</div>