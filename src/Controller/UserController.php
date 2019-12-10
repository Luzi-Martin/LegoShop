<?php

namespace App\Controller;

use App\Repository\LocationRepository;
use App\Repository\UserRepository;
use App\Validation\InjectionHandler;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $view = new View('user/index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->display();
    }

    public function login()
    {
        $view = new View('user/login');
        $view->title = "Anmeldung";
        $view->heading = "Anmeldung";
        $view->display();
    }

    public function doLogin()
    {
        session_start();
        $userRepository = new UserRepository();
        if (!isset($_POST['inputPassword']) || !isset($_POST['inputEmail'])) {
            echo "Fehler beim Übertragen der Daten";
        }

        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];
        $id = 0;
        $id = $userRepository->getIdByMailAndPassword($email, $password);
        $isAdmin = $userRepository->getAdminById($id);
        
        if($id < 1){
            echo "Falsche Einloggdaten!";
            header('Location: /user/login');
        } else {
            $_SESSION['user']['email'] = $email;
            $_SESSION['loggedin'] = true;
            $_SESSION['isAdmin'] = $isAdmin;
            
           header('Location: /');
        }
    }

    public function registration()
    {
        $locationsRepository = new LocationRepository();

        $view = new View('user/registration');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->locations = $locationsRepository->readAll();
        $view->display();
    }
    public function doRegistrate()
    {
        if (isset($_POST['send'])) {
            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $street = $_POST['street'];
            $house_nr = $_POST['house_nr'];
            $location_id = $_POST['location_id'];

            /// Injection Handling
            $fields = array($firstName, $lastName, $email, $password, $street, $house_nr, $location_id);

            if (InjectionHandler::hasInjections($fields)) {
                return;
            }

            $userRepository = new UserRepository();
            $userRepository->create($firstName, $lastName, $email, $password, $street, $house_nr, $location_id);
        }
        header('Location: /');
    }

    public function create()
    {
        $view = new View('user/create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->display();
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function doLogout()
    {
        session_start();
        unset($_SESSION['loggedin']);
        unset($_SESSION['user']['email']);
        session_destroy();
        header('Location: /user/logout');
    }

    public function logout()
    {
        $view = new View('user/logout');
        $view->title = "Abmeldung";
        $view->heading = "Abmeldung";
        $view->display();
    }
}
