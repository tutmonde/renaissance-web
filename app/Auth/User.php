<?php

declare(strict_types=1);

namespace App\Auth;

use Nette;
use Nette\Database\Explorer;

class User
{
    private int $id;
    private Explorer $db;

    public function __construct($id = 0)
    {
        $this->id = $id;
        $this->db = $db->table('users')->get($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->db->f_name;
    }

    public function getLastName()
    {
        return $this->db->l_name;
    }

    public function getFullName()
    {
        return `{$this->db->f_name} {$this->db->l_name}`;
    }

    public function getNickName()
    {
        return $this->db->nick;
    }

    public function getLocation()
    {
        return $this->db->location;
    }

    public function getBirthday()
    {
        return DateTime::createFromFormat($this->db->birthday, 'Y-m-d');
    }

    public function getPhone()
    {
        return $this->db->phone;
    }

    /*
     * Greetings! Sex? :D
     * 
     * @return True if male, False if femaly
     */
    public function getSex()
    {
        return $this->db->sex == 1;
    }
}