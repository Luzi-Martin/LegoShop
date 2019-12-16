<?php

namespace App\Controller;

use App\Repository\LocationRepository;
use App\Repository\UserRepository;
use App\Validation\InjectionHandler;
use App\Validation\PatternHandler;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController extends Controller
{
    public function index()
    {

        $view = new View('user/index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->display($this->returnRole());
    }

    public function login()
    {
        $view = new View('user/login');
        $view->title = "Anmeldung";
        $view->heading = "Anmeldung";
        $view->display($this->returnRole());
    }

    public function doLogin()
    {
        session_start();
        $userRepository = new UserRepository();
        if (!isset($_POST['inputPassword']) || !isset($_POST['inputEmail']) ||InjectionHandler::hasInjections($_POST['inputEmail']) || PatternHandler::isEmail($_POST['inputEmail'])) {
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

            $_SESSION['role'] = 0;
        } else {
            $_SESSION['user']['email'] = $email;
            $_SESSION['loggedin'] = true;
            $_SESSION['isAdmin'] = $isAdmin;
            $_SESSION['id'] = $id;
            if($isAdmin == 1){
                $_SESSION['role'] = 2;
            }else if($isAdmin == 0){
                $_SESSION['role'] == 1;
            }else{
                $_SESSION['role'] == 0;
            }
            
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
        $view->display($this->returnRole());
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
                header('Location:/');
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
        $view->display($this->returnRole());
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
        unset($_SESSION['user']['email']);
        unset($_SESSION['id']);
        $_SESSION['role'] = 0;
        $_SESSION['loggedin'] = 0;

        session_destroy();
        header('Location: /');
    }

    public function logout()
    {
        $view = new View('user/logout');
        $view->title = "Abmeldung";
        $view->heading = "Abmeldung";
        $view->display($this->returnRole());
    }

    public function edit(){
        $role = $this->returnRole();
        if($role != 0){
            
            $locationsRepository = new LocationRepository();
            $userRepository = new UserRepository();
            $view = new View('user/edit');
            $view->title = "bearbeiten";
            $view->heading = "bearbeiten";
            $view->locations = $locationsRepository->readAll();
            $view->user = $userRepository->readById($_SESSION['id']);
            $view->display($role);
        }else{
            header('Location: /');
        }
    }

    public function doEdit(){
        session_start();
        $userRepository = new UserRepository();
        $id = $_SESSION['id'];
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $email = $_POST['email'];
        $street = $_POST['street'];
        $house_nr = $_POST['house_nr'];
        $location_id = $_POST['location_id'];

        /// Injection Handling
        $fields = array($firstName, $lastName, $email, $street, $house_nr, $location_id);

        if (InjectionHandler::hasInjections($fields)) { 
            header('Location:/');
            return; 
        }

        $userRepository->updateById($id, $firstName, $lastName, $email, $street, $house_nr, $location_id);

        header('Location: /');
        echo "Daten erfolgreich geändert";
    }

    public function editPassword(){
        $role = $this->returnRole();
        if($role != 0){
            $userRepository = new UserRepository();
            $view = new View('user/editPassword');
            $view->title = "Passwort bearbeiten";
            $view->heading = "Passwort bearbeiten";
            $view->user = $userRepository->readById($_SESSION['id']);
            $view->display($role);
        }else{
            header('Location: /');
        }
    }

    public function doEditPassword(){
        
        session_start();
        $userRepository = new UserRepository();  
        $id = $_SESSION['id'];
        $firstNewPassword = $_POST['firstNewPwd'];
        $secondNewPassword = $_POST['secondNewPwd'];
        
        //Injection Handling
        $fields = array($firstNewPassword, $secondNewPassword);

        if(InjectionHandler::hasInjections($fields)){
            header('Location:/');
            return; 
        }
        if($firstNewPassword == $secondNewPassword){
            $userRepository->updatePwdById($id, $firstNewPassword);
            echo "Daten erfolgreich geändert";
            header('Location: /');
        }else{
            header('Location: /user/editPassword');
            echo "Passwörter stimmen nicht überein";
        }

    }
}
