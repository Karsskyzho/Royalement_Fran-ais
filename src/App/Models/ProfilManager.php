<?php

    namespace App\Models;

    use Library\Core\AbstractModel;

    class ProfilManager extends AbstractModel
    {
        public function updateUser(): void
        {
            $this->db->execute(
                'UPDATE users 
            SET user_name = :user_name, user_firstname = :user_firstname, user_birthday = :user_birthday, phone_number =:phone_number, email = :email, user_address = :user_address  
            WHERE id = :id',
                [
                    'user_name' => htmlentities($_POST['name']),
                    'user_firstname' => htmlentities($_POST['firstname']),
                    'user_birthday' => htmlentities($_POST['birthday']),
                    'phone_number' => htmlentities($_POST['phone']),
                    'email' => htmlentities($_POST['email']),
                    'user_address' => htmlentities($_POST['address']),
                    'id' => $_SESSION['id']
                ]);
        }
    }