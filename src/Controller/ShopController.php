<?php

namespace App\Controller;

use App\Repository\ShoppingCartRepository;
use App\Repository\ShopRepository;
use App\View\View;
use App\Validation\PatternHandler;
use App\Validation\InjectionHandler;

/**
 * Siehe Dokumentation im DefaultController.
 */
class ShopController extends Controller
{

    /*  index()
        Funktion zum anzeigen alle Produkte
    */
    public function index()
    {
        $role = $this->returnRole();
        if($role != 0) {
        $shopRepository = new ShopRepository();
        $view = new View('shop/index');
        $view->products = $shopRepository->readAll();
        $view->display($role);
        } else {
            header('Location:/');
        }
    }

    /*  product()
        Funktion zum speichern eines Produktes als Benutzer ohne admin Recht
    */

    public function product()
    {
        if(InjectionHandler::hasInjections($_GET['id'])) { 
            header('Location:/');
            return; 
        }

        $shopRepository = new ShopRepository();
        $view = new View('shop/product');
        $product = $shopRepository->readById($_GET['id']);
        if(!isset($product)) {
            header('Location:/shop');
        }
        $view->product = $product;
        $view->display($this->returnRole());
    }

    /*  addToShoppingCart()
        Funktion zum hinzufügen eines Produktes zum Warenkorb.
    */

    public function addToShoppingCart() {
        session_start();
        if(isset($_GET['id']) && InjectionHandler::hasInjections($_GET['id'])) {
            header('Location:/');
            return;
        }

        $shoppingCartRepository = new ShoppingCartRepository();
        
        if(isset($_SESSION['id'])) {
            $shoppingCartRepository->addToShoppingCart($_SESSION['id'] ,$_GET['id']);
        }
        header('Location:/shop');
    }

    /*  saveProduct()
        Funktion zum Anzeigen des Warenkorbs.
    */

    public function shoppingCart() {
        $role = $this->returnRole();
        if(isset($_SESSION['id']) && InjectionHandler::hasInjections($_SESSION['id'])) { 
            header('Location:/');
            return; 
        }
        
        $shoppingCartRepository = new ShoppingCartRepository();
        if($role != 0) {
        $view = new View('shop/shoppingCart');
        $view->products = $shoppingCartRepository->getMyProducts($_SESSION['id']);
        $view->display($role);
        } else {
            header('Location:/');
        }
        
    }

    /*  saveProduct()
        Funktion zum löschen eines Produktes aus dem Warenkorb.
    */

    public function removeFromShoppinCart() {
        echo $_POST['id'];

        session_start();
        if(isset($_POST['id']) && InjectionHandler::hasInjections($_POST['id'])) {
            header('Location:/');
            return;
        }


        $shoppingCartRepository = new ShoppingCartRepository();
        $shoppingCartRepository->deleteById($_POST['id']);
        header('Location:/shop/shoppingCart');
    }
}
