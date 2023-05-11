

<?php

require_once(APP_PATH.'app/app.php');

const TBALE_NAME = 'client';
const COL_ID = 'id';
const COL_NAME = 'name';

class MysqlDataProvider extends DataProvider {

  private $db = null;
  function __construct() {
    $this->db = new MysqlDatabase();
  }

  function add_client(string $name) {
    $sql = sprintf("INSERT INTO %s(%s) VALUES(:name);", TBALE_NAME, COL_NAME);
    return $this->db->execute($sql, ['name' => $name]);
  }

  function update_client(int $id, string $new_name) {
    $sql = sprintf("UPDATE %s SET %s = :name WHERE %s = :id;", TBALE_NAME, COL_NAME, COL_ID);
    return $this->db->execute($sql, [':name' => $new_name, ':id' => $id]);
  }

  function delete_client(int $id) {
    $sql = sprintf("DELETE FROM %s WHERE %s = :id;", TBALE_NAME, COL_ID);
    return $this->db->execute($sql, [':id' => $id]);
  }


  function get_client(int $id) : Client | false{
    $sql = sprintf("SELECT * FROM %s WHERE %s = :id;", TBALE_NAME, COL_ID);
    $res = $this->db->query($sql, [':id' => $id]);
    return empty($res) ? false : $res[0];
  }

  function get_clients() {
    $sql = sprintf("SELECT * FROM %s;", TBALE_NAME);
    return $this->db->query($sql);
  }

  function close() {
    $this->db->disconnect();
  }

}



?>