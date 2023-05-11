



<?php


class Client {
  public int $id;
  public string $name;

  function __toString() {
    return $this->id . ',' . $this->name;
  }
}



?>