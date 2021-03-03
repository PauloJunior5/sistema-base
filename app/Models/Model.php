<?php

namespace App\Models;

class Model
{
    protected $id;
    protected $created_at;
    protected $updated_at;

    function __construct()
    {
        $this->id = 0;
        $this->created_at = null;
        $this->updated_at = null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at(string $created_at = null)
    {
        $this->created_at = $created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function setUpdated_at(string $updated_at = null)
    {
        $this->updated_at = $updated_at;
    }
}