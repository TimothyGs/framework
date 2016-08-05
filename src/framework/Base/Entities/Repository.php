<?php

namespace Framework\Base\Entities;

abstract class Repository
{
    protected $db;

    protected $repository;

    public function __construct(DatabaseInterface $database)
    {
        $this->db = $database;
    }

    public function get($id)
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
