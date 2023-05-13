

<div>

  <h1>Clients</h1>

  <div>
    <div>
      <a href="archive.php">Archive des clients</a>
    </div>
  <a href="index.php">User</a>
    <ol>
      <li>
        <span>ID</span>
        <span>Name</span>          
        <span>Reception date</span>          
        <span>Reception time</span>          
      </li>
      <?php foreach($model as $index => $client):?>
        <li>
          <span>[<?=$client->id?>]</span>
          <span><?=$client->name?></span>          
          <span><?=$client->reception_date?></span>          
          <span><?=$client->reception_time?></span>          
        </li>
      <?php endforeach?>
    
    </ol>

  </div>
</div>