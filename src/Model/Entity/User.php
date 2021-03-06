<?php
namespace LeoGalleguillos\User\Model\Entity;

use DateTime;
use LeoGalleguillos\User\Model\Entity as UserEntity;

class User
{
    public $emailAddresses = [];
    public $username;
    public $firstName;
    public $lastName;

    protected $created;
    protected $displayName;
    protected $gender;
    protected $groups = [];
    protected $userId;
    protected $views = 0;
    protected $welcomeMessage;

    public function getCreated() : DateTime
    {
        return $this->created;
    }

    public function getDisplayName() : string
    {
        return $this->displayName;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getGroups(): array
    {
        return $this->groups;
    }

    public function getUserId() : int
    {
        return $this->userId;
    }

    public function getUsername() : string
    {
        return $this->username;
    }

    public function getViews() : int
    {
        return $this->views;
    }

    public function getWelcomeMessage() : string
    {
        return $this->welcomeMessage;
    }

    public function setCreated(DateTime $created) : UserEntity\User
    {
        $this->created = $created;
        return $this;
    }

    public function setDisplayName(string $displayName) : UserEntity\User
    {
        $this->displayName = $displayName;
        return $this;
    }

    public function setGender(string $gender): UserEntity\User
    {
        $this->gender = $gender;
        return $this;
    }

    public function setGroups(array $groups): UserEntity\User
    {
        $this->groups = $groups;
        return $this;
    }

    public function setUserId(int $userId) : UserEntity\User
    {
        $this->userId = $userId;
        return $this;
    }

    public function setUsername(string $username) : UserEntity\User
    {
        $this->username = $username;
        return $this;
    }

    public function setViews(int $views) : UserEntity\User
    {
        $this->views = $views;
        return $this;
    }

    public function setWelcomeMessage(string $welcomeMessage) : UserEntity\User
    {
        $this->welcomeMessage = $welcomeMessage;
        return $this;
    }
}
