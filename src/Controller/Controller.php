<?php

namespace App\Controller;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class Controller
{
    /*
        Falls ein User nicht eingeloggt ist, kriegt er die Rolle null
        Falls er eingeloggt ist, aber kein Admin ist, kriegt er die Rolle eins
        Falls er eingeloggt ist und ein Admin ist, kriegt er die Rolle zwei
    */ 
    public function returnRole(){
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1){
            if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1){ return 2; }
            else{ return 1;}
        }else{ return 0; }
    }
}
