



<?php


class Client {
  public int $id;
  public string $name;
  public string $reception_date;
  public string $reception_time;

}


class ArchivedClient {
  public int $id;
  public int $client_id;
  public string $name;
  public string $reception_date;
  public string $reception_time;
  public string $last_modification;

}

?>