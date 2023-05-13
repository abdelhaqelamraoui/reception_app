

<div>

  <h1>Archive of clients</h1>

  <div>
    <div>
      <a href="admin.php">Back</a>
    </div>

    <ol>
    <li>
        <span>ID</span>
        <span>Name</span>          
        <span>Reception date</span>          
        <span>Reception time</span>          
        <span>Old name</span>          
        <span>Last modification</span>          
      </li>
      <?php foreach($model as $index => $archived_client):?>
        <li>
          <span>[<?=$archived_client->id?>]</span>
          <span><?=$archived_client->name?></span>          
          <span><?=$archived_client->reception_date?></span>          
          <span><?=$archived_client->reception_time?></span>          
          <span><?=$archived_client->old_name?></span>          
          <span><?=$archived_client->last_modification?></span>          
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