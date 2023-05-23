




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

  abstract function search_client(string $name);

  // User

  abstract function add_new_user(string $first_name, string $last_name, string $username, string $password);
  abstract function update_user(int $id, string $first_name, string $last_name, string $username, string $password);
  abstract function get_users();
  abstract function get_user(string $username);

  // Admin

  abstract function update_admin(string $username, string $password);
  abstract function get_admin();


}



?>