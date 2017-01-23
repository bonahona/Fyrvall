create table PageSegment(
  Id int not null primary key auto_increment,
  Content varchar(16636),
  SortOrder int not null default 0,
  IsActive int(1) not null default 1,
  IsDeleted int(1) not null default 0,
  PageId int not null,
  foreign key(PageId) references Page(Id)
);