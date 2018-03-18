<?php
class DbCreation implements IDatabaseMigration
{
    public function GetUniqueName()
    {
        return '12ffd4965b874481bb6ef8da42e5ebb6';
    }

    public function GetSortOrder()
    {
        return 0;
    }

    public function Up($migrator)
    {
        $migrator->CreateTable('LocalUser')
            ->AddPrimaryKey('Id', 'int')
            ->AddColumn('ShellUserId', 'int');

        $migrator->CreateTable('Page')
            ->AddPrimaryKey('Id', 'int')
            ->AddColumn('NavigationTitle', 'varchar(128)')
            ->AddColumn('PageTitle', 'varchar(128)')
            ->AddColumn('CreateDate', 'varchar(32)')
            ->AddColumn('SortOrder', 'int', array('not null', 'default 0'))
            ->AddColumn('IsActive', 'int(1)', array('not null', 'default 1'))
            ->AddColumn('IsDeleted', 'int(1)', array('not null', 'default 0'))
            ->AddColumn('ShowInMenu', 'int(1)', array('not null', 'default 1'))
            ->AddColumn('CreatedByUserId', 'int')
            ->AddReference('Page', 'Id', array(), 'ParentPageId');

        $migrator->CreateTable('PageSegment')
            ->AddPrimaryKey('Id', 'int')
            ->AddColumn('Content', 'varchar(16336)')
            ->AddColumn('SortOrder', 'int', array('not null', 'default 0'))
            ->AddColumn('IsActive', 'int(1)', array('not null', 'default 0'))
            ->AddColumn('IsDeleted', 'int(1)', array('not null', 'default 0'))
            ->AddReference('Page', 'Id', array('not null'));

        $migrator->CreateTable('PageOption')
            ->AddPrimaryKey('Id', 'int')
            ->AddColumn('Identifier', 'varchar(128)')
            ->AddColumn('Value', 'varchar(128)');
    }

    public function Down($migrator)
    {

    }

    public function Seed($migrator)
    {
        $migrator->Models->PageOption->Create([
            'Identifier' => 'StartPage',
            'Value' => '0'
        ])->Save();
    }
}