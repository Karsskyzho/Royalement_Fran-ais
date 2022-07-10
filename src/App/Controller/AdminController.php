<?php

    namespace App\Controller;

    use App\Models\AdminManager;
    use Library\Core\AbstractController;


    class AdminController extends AbstractController
    {
        public function index(): void
        {

            if ($_SESSION['role_user'] !== 'admin') {
                $this->redirect('/'); //fonction qui vient d'abstract controller pour rediriger
            }

            if ($_POST)
            {
                $route = '../images/';
                $photo1 = $route . $_POST['photo1'];
                $photo2 = $route . $_POST['photo2'];
                $photo3 = $route . $_POST['photo3'];
                $photo4 = $route . $_POST['photo4'];
                $photo5 = $route . $_POST['photo5'];
                $manager = new AdminManager($_POST['name'], $_POST['description'], $_POST['price'], $_POST['category'], $_POST['size'], $photo1, $photo2, $photo3, $photo4, $photo5, $_POST['feature']);
                $manager->addProduct();
                $manager->joinTheNewProduct();
            }

            $this->display(
                'admin', [
                'title' => 'Royalement Français - Admin',
                'banner' => '../images/background.webp'
            ]);
        }
    }
