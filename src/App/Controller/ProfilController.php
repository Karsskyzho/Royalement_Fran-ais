<?php


    namespace App\Controller;

    use Library\Core\AbstractController;

    //use App\Models\ProfilManager;

    class ProfilController extends AbstractController
    {
        public function index(): void
        {
            if (! isset($_SESSION['user_name'])) {
                $this->redirect('/'); //fonction qui vient d'abstract controller pour rediriger
            }

            if (isset($_POST['logout'])) {
                $_SESSION = [];
                session_destroy();

                header("location:/connectionUser");
                exit();
            }

            $this->display(
                'profil', [
                'title' => 'Royalement Français - profil',
                'banner' => '../images/background.webp',
            ]);
        }
    }