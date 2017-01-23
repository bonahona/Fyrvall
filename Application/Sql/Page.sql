create table Page(
  Id int not null primary key auto_increment,
  NavigationTitle varchar(128),
  PageTitle varchar(128),
  CreateDate varchar(32),
  SortOrder int not null default 0,
  IsActive int(1) not null default 1,
  IsDeleted int(1) not null default 0,
  ShowInMenu int(1) not null default 1,
  CreatedByUserId int not null,
  ParentPageId int,
  foreign key(CreatedByUserId) references LocalUser(Id),
  foreign key(ParentPageId) references Page(Id)
);