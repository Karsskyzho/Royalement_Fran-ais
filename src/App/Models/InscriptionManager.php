<?php

namespace App\Models;

use Library\Core\AbstractModel;

class InscriptionManager extends AbstractModel {

    private string $user_name;
    private string $user_firstname;
    private string $user_birthday;
    private string $password;
    private string $phone_number;
    private string $email;
    private string $user_address;
    private string $user_city;

    public function __construct($user_name, $user_firstname, $user_birthday, $password, $phone_number, $email, $user_address, $user_city, $user_region, $user_departement) {
        parent::__construct();
        $this->user_name = $user_name;
        $this->user_firstname = $user_firstname;
        $this->user_birthday = $user_birthday;
        $this->password = $password;
        $this->phone_number = $phone_number;
        $this->email = $email;
        $this->user_address = $user_address;
        $this->user_region = $user_region;
        $this->user_departement = $user_departement;
        $this->user_city = $user_city;

    }
//----------------------------------------------------------
    public function setUsername($user_name):void {
        $this->user_name = $user_name;
    }
    public function getUserName(): string {
        return $this->user_name;
    }
//----------------------------------------------------------
    public function setUserFirstName($user_firstname):void {
        $this->user_firstname = $user_firstname;
    }
    public function getUserFirstName(): string {
        return $this->user_firstname;
    }
//----------------------------------------------------------
    public function setUserBirthday($user_birthday):void {
        $this->user_birthday = $user_birthday;
    }
    public function getUserBirthday(): string {
        return $this->user_birthday;
    }
//----------------------------------------------------------
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

//----------------------------------------------------------
    public function setNumberUser($phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    public function getNumberUser(): string
    {
        return $this->phone_number;
    }

//----------------------------------------------------------
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

//----------------------------------------------------------
    public function setUserAddress($user_address): void
    {
        $this->user_address = $user_address;
    }

    public function getUserAddress(): string
    {
        return $this->user_address;
    }

//----------------------------------------------------------
    public function setUserCity($user_city): void
    {
        $this->user_city = $user_city;
    }

    public function getUserCity(): string
    {
        return $this->user_city;
    }

    public function setUserRegion($user_region):void {
        $this->user_region = $user_region;
    }
    public function getUserRegion():string {
        return $this->user_region;
    }

    public function setUserDepartement($user_departement):void {
        $this->user_departement = $user_departement;
    }
    public function getUserDepartement():string {
        return $this->user_departement;
    }

//----------------------------------------------------------

    public function createUser(): void
    {
        $this->db->execute(
            'INSERT INTO users (user_name, user_firstname, user_birthday, password, phone_number, email, user_address, user_region, user_departement, user_city) 
                VALUES (:user_name, :user_firstname, :user_birthday, :password, :phone_number, :email, :user_address, :user_region, :user_departement, :user_city)',
            [
                'user_name' => htmlentities($this->getUserName()),
                'user_firstname' => htmlentities($this->getUserFirstname()),
                'user_birthday' => htmlentities($this->getUserBirthday()),
                'password' => password_hash(htmlentities($this->getPassword()), PASSWORD_DEFAULT),
                'email' => htmlentities($this->getEmail()),
                'phone_number' => htmlentities($this->getNumberUser()),
                'user_address' => htmlentities($this->getUserAddress()),
                'user_region' => htmlentities($this->getUserRegion()),
                'user_departement' => htmlentities($this->getUserDepartement()),
                'user_city' => htmlentities($this->getUserCity())
            ]);
    }
}