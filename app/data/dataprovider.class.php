




<?php


abstract class DataProvider {

  function __construct(private string $source){}

  abstract function add_client(string $name);

  abstract function update_client(int $id, string $new_name);

  abstract function delete_client(int $id);

  abstract function get_client(int $id);

  abstract function get_clients();

  abstract function close();

  // Archive part

  abstract function archive_new_client(string $name);

  abstract function archive_edited_client(int $id, string $new_name);

  abstract function get_archived_clients();

}



?>