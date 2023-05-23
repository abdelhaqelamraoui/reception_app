

create database if not exists reception;

use reception;


-- admin
create table if not exists reception.admin (
  id int not null default 1,
  username varchar(255) not null unique,
  password varchar(255) not null,
  primary key(id)
);

-- user
create table if not exists reception.users (
  id int not null auto_increment,
  first_name varchar(255) not null,
  last_name varchar(255) not null,
  username varchar(255) not null unique,
  password varchar(255) not null,
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
  id int not null auto_increment, -- pk
  client_id int not null,
  name varchar(100),
  reception_date date,
  reception_time time,
  last_modification datetime,
  primary key(id)
);


