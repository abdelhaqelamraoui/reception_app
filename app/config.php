

<?php

  define('CONFIG', [
    'app_name' => 'Reception App',
    'app_path' => APP_PATH,
    'db' => [
      'host' => 'localhost',
      'port' => '3306',
      'username' => 'root',
      'password' => 'root',
      'dbname' => 'reception'
    ],
    'admin' => [
      'admin' => '1234',
    ],
    'users' => [
        'user1' => '1234',
        'user2' => '123456'
    ]
  ]);
  
  $keys = ['db_connection', 'add', 'edit', 'remove', 'update'];
  $errors = [];
  foreach($keys as $i => $k)
    $errors[$k] = $i+1;
  define('ERROR', $errors);



?>