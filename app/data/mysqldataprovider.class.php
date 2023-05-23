

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
    $res = $this->db->query('SELECT * FROM client;');
    return empty($res) ? false : $res;
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


    // User

    function add_new_user(string $first_name, string $last_name, string $username, string $password) {
      return $this->db->execute(
        'INSERT INTO users(first_name, last_name, username, password) VALUES(:fn, :ln, :un, :pw);',
        [':fn' => $first_name, ':ln' => $last_name, ':un' => $username, ':pw' => $password]
      );
    }

    function update_user(int $id, string $first_name, string $last_name, string $username, string $password) {
      return $this->db->execute(
        'UPDATE users SET first_name = :fn, last_name = :ln, username = :un, password = :pw WHERE id = :id',
        [':fn' => $first_name, ':ln' => $last_name, ':un' => $username, ':pw' => $password, ':id' => $id]
      );
    }

    function get_users() {
      return $this->db->query('SELECT * FROM users', null, 'User');
    }
  
    function get_user(string $username) {
      $res =  $this->db->query(
        'SELECT * FROM users WHERE username = :un;',
        [':un' => $username],
        'User'
      );
      return empty($res) ? false : $res[0];
    }
    
    // Admin
      
    /**
     * reteives the admin credentials from the databases as an Admin instace
     * @return `Admin` on success, `false` on failure
     */
    function get_admin() {
      $res = $this->db->query('SELECT * FROM admin', null, 'Admin');
      return empty($res) ? false : $res[0];
    }
      
    /**
     * sets the admin credentials
     * @param  string $username
     * @param  string $password
     * @return bool `true` if succeeded, else `false`
     */
    function set_admin($username, $password) {
      return $this->db->execute(
        'INSERT INTO admin VALUES(1, :un, :pw);',
        [':un' => $username, ':pw' => $password]
      );
    }
      
    /**
     * updates the existing admin with new credentials
     * @param  string $username
     * @param  string $password
     * @return bool `true` if succeeded, else `false`
     */
    function update_admin($username, $password) {
      return $this->db->execute(
        'UPDATE admin SET username = :un, password = :pw WHERE id = 1;',
        [':un' => $username, ':pw' => $password]
      );
    }

    // config

    function get_configs() {
      $res = $this->db->query('SELECT * FROM config;', 'Config');
      return empty($res) ? false : $res;
    }

    function get_config(string $ckey) {
      $res = $this->db->query('SELECT * FROM config WHERE ckey = :k;',[':k' => $ckey], 'Config');
      return empty($res) ? false : $res[0];
    }

    function delete_config(string $ckey) {
      return $this->db->execute('DELETE FROM config WHERE ckey = :k;', [':k' => $ckey]);
    }

    function add_config(string $ckey, string $cvalue) {
      return $this->db->execute(
        'INSERT INTO config(ckey, cvalue) VALUES(:k, :v);',
        [':k' => $ckey, ':v' => $cvalue]
      );
    }

    function update_config(string $ckey, string $cvalue) {
      return $this->db->execute(
        'UPDATE config SET cvalue = :v WHERE ckey = :k',
        [':k' => $ckey, ':v' => $cvalue]
      );
    }

}


?>