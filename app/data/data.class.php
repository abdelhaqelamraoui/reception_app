


<?php

require_once('dataprovider.class.php');


final class Data {

  static private DataProvider $dp;

  function __construct(DataProvider $dp) {
    self::$dp = $dp;
  }
  
  /**.
   * initializes the the `Data` class with a `DataProvider` instance
   * This shoud be called first before any other methode of he class.
   * @param  DataProvider $dp
   * @return void
   */
  static function init(DataProvider $dp) {
    self::$dp = $dp;
  }
  
  /**
   * adds a new client with the given name
   *
   * @param  string $name
   * @return bool `true` on success, else `false`
   */
  static function add_client(string $name) {
    return self::$dp->add_client($name) && self::$dp->archive_new_client($name);
  }
  
  /**
   * updates a client with the given info
   *
   * @param  int $id
   * @param  string $new_name
   * @return bool `true` on success, else `false`
   */
  static function update_client(int $id, string $new_name) {
    return self::$dp->archive_edited_client($id, $new_name)
        && self::$dp->update_client($id, $new_name);
  }
  
  /**
   * deletes a client with the given id
   *
   * @param  int $id
   * @return bool `true` on success, else `false`
   */
  static function delete_client(int $id) {
    return self::$dp->delete_client($id);
  }

  
  /**
   * returns a Client object with the given id
   * @param  int $id
   * @return `Client` on success, `false` on failure
   */
  static function get_client(int $id) {
    return self::$dp->get_client($id);
  }

  static function get_clients() {
    return self::$dp->get_clients();
  }
  
  /**
   * closes the `DataProvider` active connection.
   *
   * @return void
   */
  static function close() {
    self::$dp->close();
  }

  // Archive
  
  /**
   * get_archived_clients
   *
   * @return void
   */
  static function get_archived_clients() {
    return self::$dp->get_archived_clients();
  }

  // Search  
  /**
   * search_client
   *
   * @param  mixed $name
   * @return void
   */
  static function search_client(string $name) {
    return self::$dp->search_client($name);
  }

  // User
  
  /**
   * adds a new user to the data storage
   *
   * @param  string $first_name
   * @param  string $last_name
   * @param  string $username
   * @param  string $password
   * @return bool `true` on success, else `false`
   */
  static function add_new_user($first_name, $last_name, $username, $password) {
    // TODO [0] : add the key of the encryption (the password or smth else ?)
    $first_name = encrypt_data($first_name, '');
    $last_name = encrypt_data($last_name, '');
    $username = hash_data($username);
    $password = hash_data($password);
    return self::$dp->add_new_user($first_name, $last_name,$username, $password);
  }  
  /**
   * returns all users in the data storage
   *
   * @return array on success, `false` on failure
   */
  static function get_users() {
    return self::$dp->get_users();
  }
  
  /**
   * returns a User with the given username from the data storage
   *
   * @param  string $username
   * @return User on success, `false` on failure
   */
  static function get_user(string $username) {
    $username = hash_data($username);
    $user = self::$dp->get_user($username);
    return $user instanceof User ? $user : false;
  }
  
  // Admin
  
  /**
   * updates the existing admin in data storage with the given info
   *
   * @param  string $username
   * @param  string $password
   * @return bool `true` on success, else `false`
   */
  static function update_admin($username, $password) {
    $username = hash_data($username);
    $password = hash_data($password);
    return self::$dp->update_admin($username, $password);
  }
    
  /**
   * returns the admin on the data storage
   *
   * @return Admin on success, `false` on failure
   */
  static function get_admin() {
    return self::$dp->get_admin();
  }
}

?>