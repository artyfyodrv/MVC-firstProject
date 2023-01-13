<?php

namespace App\Entities;

class User
{
    private ?int $id = null;
    private string $login;
    private string $password;
    private string $passwordConfirm;
    private string $email;
    private string $name;

    public function __construct(array $data = null)
    {
        if (!isset($data)) {
            $data = $_POST;
        }
        foreach ($data as $key => $value) {
            $value = strip_tags($value);
            $value = htmlentities($value, ENT_QUOTES, "UTF-8");
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPasswordConfirm(): string
    {
        return $this->passwordConfirm;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole(): string
    {
        return $this->role;
    }


    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setPasswordConfirm(string $passwordConfirm): void
    {
        $this->passwordConfirm = $passwordConfirm;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }
}