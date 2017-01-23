create table `Option`(
  Id int not null primary key auto_increment,
  Identifier varchar(128),
  DisplayName varchar(512),
  Value varchar(512)
);