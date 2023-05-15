

<?php

require_once(APP_PATH.'app/app.php');


class MysqlDataProvider extends DataProvider {

  private $db = null;
  function __construct() {
    $this->db = new MysqlDatabase();
  }

  function add_client(string $name) {
    $sql = "INSERT INTO client(name, reception_date, reception_time) VALUES(:name, CURDATE(), CURTIME());";
    return $this->db->execute($sql, ['name' => $name]);
  }

  function update_client(int $id, string $new_name) {
    $sql = "UPDATE client SET name = :name WHERE id = :id;";
    return $this->db->execute($sql, [':name' => $new_name, ':id' => $id]);
  }

  function delete_client(int $id) {
    $sql = "DELETE FROM client WHERE id = :id;";
    return $this->db->execute($sql, [':id' => $id]);
  }


  function get_client(int $id) : Client | false{
    $sql = "SELECT * FROM client WHERE id = :id;";
    $res = $this->db->query($sql, [':id' => $id]);
    return empty($res) ? false : $res[0];
  }

  function get_clients() {
    return $this->db->query('SELECT * FROM client;');
  }

  function close() {
    $this->db->disconnect();
  }
  

  // Archive part

  function get_last_client() {
    $clients = $this->db->query('SELECT id FROM client ORDER BY id DESC LIMIT 1 ;');
    return empty($clients) ? 0 : $clients[0];
  }

  function archive_new_client(string $name) {
    $id = $this->get_last_client()->id;
    $sql = 'INSERT INTO archive(client_id, name, reception_date, reception_time) VALUES(:id, :name, CURDATE(), CURTIME() );';
    return $this->db->execute($sql, [':id' => $id, ':name' => $name]);
  }

  function archive_edited_client(int $id, string $new_name) {
    $c = $this->get_client($id);
    $str = "SELECT CONCAT(CURDATE(), ' ', CURTIME())";
    $sql = "INSERT INTO archive(client_id, name, reception_date, reception_time, last_modification) VALUES(:id, :name, :rd, :rt, ($str));";
    $params = [ ':id' => $id,
                ':name' => $new_name,
                ':rd' => $c->reception_date,
                ':rt' => $c->reception_time];
                
    return $this->db->execute($sql, $params,'ArchivedClient');
  }


  function get_archived_clients() {
    $sql = "SELECT * FROM archive;";
    return $this->db->query($sql);
  }


  function search_client(string $name) {
    return $this->db->query(
      'SELECT * FROM client WHERE name LIKE :name;',
      [':name' => '%'.$name.'%']
    );
  }

}


?>