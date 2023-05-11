


<?php

require_once('dataprovider.class.php');


final class Data {

  static private DataProvider $dp;

  function __construct(DataProvider $dp) {
    self::$dp = $dp;
  }

  static function init(DataProvider $dp) {
    self::$dp = $dp;
  }

  static function add_client(string $name) {
    return self::$dp->add_client($name);
  }

  static function update_client(int $id, string $new_name) {
    return self::$dp->update_client($id, $new_name);
  }

  static function delete_client(int $id) {
    return self::$dp->delete_client($id);
  }


  static function get_client(int $id) : Client | false{
    return self::$dp->get_client($id);
  }

  static function get_clients() {
    return self::$dp->get_clients();
  }

  static function close() {
    self::$dp->close();
  }
}

?>