<?php

    namespace App\Controller;

    use App\Models\ProfilManager;
    use Library\Core\AbstractController;

    class UpdateController extends AbstractController
    {
        public function index(): void
        {
            if (! isset($_SESSION['user_name'])) {
                $this->redirect('/'); //fonction qui vient d'abstract controller pour rediriger
            }
                if (! empty($_POST['name']) && ! empty($_POST['firstname']) && ! empty($_POST['birthday']) &&! empty($_POST['phone']) && ! empty($_POST['email']) && ! empty($_POST['address'])) {
                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        echo 'etape 2';
                            $manager = new ProfilManager();
                            $manager->updateUser();

                            $_SESSION['user_name'] = $_POST['name'];
                            $_SESSION['user_firstname'] = $_POST['firstname'];
                            $_SESSION['userBirthday'] = $_POST['birthday'];
                            $_SESSION['phone_number'] = $_POST['phone'];
                            $_SESSION['email'] = $_POST['email'];
                            $_SESSION['address'] = $_POST['address'];

                            $this->redirect('/profil');
                    }
            }

                $this->display(
                    'modifyProfil', [
                    'title' => 'Royalement Français - Modifier votre profil',
                    'banner' => '../images/background.webp',
                ]);
            }
    }
