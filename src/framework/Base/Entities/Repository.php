<?php

namespace Framework\Base\Entities;

class Repository
{
    protected $db;

    public function __construct(DatabaseInterface $database)
    {
        $this->db = $database;
    }

    public function getById($id)
    {

    }

    public function getByIndex($index = '')
    {

    }

    public function persist()
    {

    }

    public function save()
    {

    }

    public function update()
    {

    }
}
