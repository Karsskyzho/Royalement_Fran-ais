<?php

    namespace App\Controller;

    use App\Models\ConnectionManager;
    use Library\Core\AbstractController;

    class ConnectionController extends AbstractController
    {
        public function index(): void
        {

            if (! empty($_POST['email']) && (isset($_POST['password']))) {
                $email = htmlspecialchars($_POST['email']);
                // $email = strtolower($email); // Pour éviter les erreurs avec les majuscules, on réduit tout en minuscule

                $manager = new ConnectionManager();
                // On regarde si l'utilisateur est inscrit dans la table utilisateurs
                $user = $manager->getUser($email);

                if (!$user) {
                    echo "Votre email est invalide";
                } else {
                    $hash = $user['password'];
                    if (!password_verify($_POST['password'], $hash)) {
                        echo "Votre mot de passe est invalide";
                    } else {
                        $manager->userConnection(
                            $user['id'], $user['user_name'], $user['user_firstname'],  $user['user_birthday'], $user['password'], $user['phone_number'], $user['email'],  $user['user_address'], $user['user_region'] , $user['user_departement'], $user['user_city'], $user['role_user']
                        );
                        $this->redirect('/profil');
                    }
                }
            }
            $this->display(
                'connectionUser', [
                    'title' => 'Royalement Français - Connexion',
                    'banner' => '../images/backgroundhd.jpg'
                ]);
        }
    }