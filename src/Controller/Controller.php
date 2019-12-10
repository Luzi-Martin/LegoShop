<?php

namespace App\Controller;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class Controller
{
    public function returnRole(){
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1){
            if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1){ return 2; }
            else{ return 1;}
        }else{ return 0; }
    }
}
