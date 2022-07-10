<?php

    namespace App\Models;

    //use Library\Core\AbstractController;
    use Library\Core\AbstractModel;

    class ConnectionManager extends AbstractModel
    {

        public function getUser(string $email):array|false
        {
            return $this->db->getUniqueResult('SELECT * FROM users WHERE email = :email', [
                'email' => $email
            ]);
        }

        public function userConnection(int $id, string $username, string $firstname, string $userBirthday, string $password, string $phone_number, string $email, string $address, string $userRegion, string $userDepartement, string $city, string $role ): void
        {
            $_SESSION['id'] = $id;
            $_SESSION['user_name'] = $username;
            $_SESSION['user_firstname'] = $firstname;
            $_SESSION['userBirthday'] = $userBirthday;
            $_SESSION['password'] = $password;
            $_SESSION['phone_number'] = $phone_number;
            $_SESSION['email'] = $email;
            $_SESSION['address'] = $address;
            $_SESSION['user_region'] = $userRegion;
            $_SESSION['user_departement'] = $userDepartement;
            $_SESSION['city'] = $city;
            $_SESSION['role_user'] = $role;
        }
    }