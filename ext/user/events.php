<?php

class UserBlockBuildingEvent extends Event
{
    /** @var array  */
    public $parts = [];

    public function add_link(string $name, string $link, int $position=50)
    {
        while (isset($this->parts[$position])) {
            $position++;
        }
        $this->parts[$position] = ["name" => $name, "link" => $link];
    }
}

class UserOptionsBuildingEvent extends Event
{
    /** @var array  */
    public $parts = [];

    public function add__html(string $html)
    {
        $this->parts[] = $html;
    }
}

class UserPageBuildingEvent extends Event
{
    /** @var User */
    public $display_user;
    /** @var array  */
    public $stats = [];

    public function __construct(User $display_user)
    {
        $this->display_user = $display_user;
    }

    public function add_stats(string $html, int $position=50)
    {
        while (isset($this->stats[$position])) {
            $position++;
        }
        $this->stats[$position] = $html;
    }
}

class UserCreationEvent extends Event
{
    /** @var  string */
    public $username;
    /** @var  string */
    public $password;
    /** @var  string */
    public $email;

    public function __construct(string $name, string $pass, string $email)
    {
        $this->username = $name;
        $this->password = $pass;
        $this->email = $email;
    }
}

class UserLoginEvent extends Event
{
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}

class UserDeletionEvent extends Event
{
    /** @var  int */
    public $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
