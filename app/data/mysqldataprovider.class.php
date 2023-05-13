

<?php

require_once(APP_PATH.'app/app.php');

const TABLE_CLIENT = 'client';
const TABLE_ARCHIVE = 'archive';
const COL_ID = 'id';
const COL_OLD_NAME = 'old_name';
const COL_NAME = 'name';
const COL_RECEPTION_DATE = 'reception_date';
const COL_RECEPTION_TIME = 'reception_time';
const COL_LAST_MODIFICATION = 'last_modification';

class MysqlDataProvider extends DataProvider {

  private $db = null;
  function __construct() {
    $this->db = new MysqlDatabase();
  }

  function add_client(string $name) {
    $sql = sprintf("INSERT INTO %s(%s,%s,%s) VALUES(:name, CURDATE(), CURTIME());",
     TABLE_CLIENT, COL_NAME, COL_RECEPTION_DATE, COL_RECEPTION_TIME);
    return $this->db->execute($sql, ['name' => $name]);
  }

  function update_client(int $id, string $new_name) {
    $sql = sprintf("UPDATE %s SET %s = :name WHERE %s = :id;", TABLE_CLIENT, COL_NAME, COL_ID);
    return $this->db->execute($sql, [':name' => $new_name, ':id' => $id]);
  }

  function delete_client(int $id) {
    $sql = sprintf("DELETE FROM %s WHERE %s = :id;", TABLE_CLIENT, COL_ID);
    return $this->db->execute($sql, [':id' => $id]);
  }


  function get_client(int $id) : Client | false{
    $sql = sprintf("SELECT * FROM %s WHERE %s = :id;", TABLE_CLIENT, COL_ID);
    $res = $this->db->query($sql, [':id' => $id]);
    return empty($res) ? false : $res[0];
  }

  function get_clients() {
    $sql = sprintf("SELECT * FROM %s;", TABLE_CLIENT);
    return $this->db->query($sql);
  }

  function close() {
    $this->db->disconnect();
  }
  

  // Archive part

  function archive_new_client(string $name) {
    $sql = sprintf("INSERT INTO %s(%s,%s,%s) VALUES(:name, CURDATE(), CURTIME());",
                    TABLE_ARCHIVE, COL_NAME, COL_RECEPTION_DATE, COL_RECEPTION_TIME);
    return $this->db->execute($sql, ['name' => $name]);
  }

  function archive_edited_client(int $id, string $new_name) {
    $old_name = $this->get_client($id)->name;
    $sql_lm = "SELECT CONCAT(CURDATE(), ' ', CURTIME())";
    $sql = "UPDATE archive SET name = :name, old_name = '$old_name', last_modification = ($sql_lm);";
    return $this->db->execute($sql, [':name' => $new_name]);
  }


  function get_archived_clients() {
    $sql = sprintf("SELECT * FROM %s;", TABLE_ARCHIVE);
    return $this->db->query($sql);
  }

}


?>