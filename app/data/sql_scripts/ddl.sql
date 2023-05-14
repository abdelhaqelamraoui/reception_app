

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
  client_id int not null, -- fk
  name varchar(100),
  reception_date date,
  reception_time time,
  last_modification datetime,
  foreign key(client_id) references client(id),
  primary key(id)
);


