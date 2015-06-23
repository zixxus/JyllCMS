<?php

class Database extends PDO
{

    public function __construct()
    {
        parent::__construct(dbtype . ':host=' . dbserver . ';dbname=' . dbname,
            dbuser,
            dbpass);
    }

}