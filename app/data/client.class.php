



<?php


class Client {
  public int $id;
  public string $name;
  public string $reception_date;
  public string $reception_time;

  function __toString() {
    return json_encode(get_class_vars(get_class()));
  }

}


?>