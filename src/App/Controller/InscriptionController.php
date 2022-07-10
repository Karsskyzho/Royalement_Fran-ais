<?php

    namespace App\Controller;
    use App\Models\InscriptionManager;
    use Library\API\ApiGouv;
    use Library\Core\AbstractController;

    class InscriptionController extends AbstractController
    {
        public function validForm(): array
        {
            $errors = [];

            //if (empty($_POST['name'])) {
              //  $errors['name'] = "Le champ ne doit pas être vide";
            //}

            if (! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { //si l'email n'est pas noté est au bon format
                $errors['email'] = "&#9888 Veuillez respecter le format standard d'email ! &#9888";
            }

            if (strlen($_POST['password']) < 8) { // si le mot de passe saisi est inférieur à 8 caractères
                $errors['password'] = " &#9888 le mot de passe doit contenir au moins 8 caractères ! &#9888 ";
            }

            if ($_POST['password'] !== $_POST['password_confirm']) { // si l'email n'est pas identique dans les deux inputs
                $errors['passwordConfirme'] = "&#9888 Les mots de passe ne sont pas identiques ! &#9888";
            }

            return $errors;
        }

        public function index(): void
        {
            $api = new ApiGouv();
            $errors = [];

            // Si le formulaire est soumis
            if (! empty($_POST)) {
                // Validation des champs
                $errors = $this->validForm();

                // Le formulaire est valide → on enregistre l'utilisateur
                if (empty($errors)) {
                    //--------------------------------------------------------------
                    $codeRegion = $_POST['regions'];
                    $region = $api->getRegion($codeRegion);
                    $regionName = $region['nom'];

                    //--------------------------------------------------------------
                    $codeDepartement = $_POST['departements'];
                    $departement = $api->getDepartement($codeDepartement);
                    $departementName = $departement['nom'];
                    //--------------------------------------------------------------
                    $codeCommune = $_POST['city'];
                    $commune = $api->getCity($codeCommune);
                    $communeName = $commune['nom'];
                    //--------------------------------------------------------------
                    $user = new InscriptionManager($_POST['name'], $_POST['firstname'], $_POST['birthday'], $_POST['password'], $_POST['phone'], $_POST['email'], $_POST['address'], $communeName, $regionName, $departementName);
                    $user->createUser();
                    //$user-> appeler les setters un par un plutôt que la fonction createUser.
                    $this->redirect('/connectionUser');
                }
            }

            $this->display(
                'inscription', [
                    'title' => 'Royalement Français - Inscription',
                    'banner' => '../images/backgroundhd.jpg',
                    'errors' => $errors
                ]
            );
        }
    }