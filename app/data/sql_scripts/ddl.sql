

create database if not exists reception;

use reception;


-- user
create table if not exists reception.admin (
  id int not null auto_increment,
  username varchar(20) not null unique,
  password varchar(20) not null,
  primary key(id)
);

TODO [0] : user have to have a name s the admin can reconize it in log
-- user
create table if not exists reception.user (
  id int not null auto_increment,
  username varchar(20) not null unique,
  password varchar(20) not null,
  primary key(id)
);


-- client [simple]
create table if not exists reception.client (
  id int not null auto_increment,
  name varchar(100),
  primary key(id)
);

-- client
create table if not exists reception.client (
  id int not null auto_increment,
  name varchar(100),
  reception_date date,
  reception_time time,
  primary key(id)
);

-- archive
create table if not exists reception.archive (
  id int not null auto_increment,
  nom varchar(100),
  reception_date date,
  reception_time time,
  old_names varchar(255),
  last_modification datetime,
  primary key(id)
);


