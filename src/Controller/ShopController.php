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
    public function index()
    {
        $shopRepository = new ShopRepository();
        $view = new View('shop/index');
        $view->products = $shopRepository->readAll();
        $view->display($this->returnRole());
    }

    public function product()
    {
        if(InjectionHandler::hasInjections($_GET['id'])) {
            return;
        }

        $shopRepository = new ShopRepository();
        $view = new View('shop/product');
        $view->product = $shopRepository->readById($_GET['id']);
        $view->display($this->returnRole());
    }

    public function addToShoppingCart() {
        session_start();
        if(isset($_GET['id']) && InjectionHandler::hasInjections($_GET['id'])) {
            return;
        }

        $shoppingCartRepository = new ShoppingCartRepository();
        
        if(isset($_SESSION['id'])) {
            $shoppingCartRepository->addToShoppingCart($_SESSION['id'] ,$_GET['id']);
        }
        header('Location:/shop');
    }

    public function shoppingCart() {
        $role = $this->returnRole();
        if(isset($_SESSION['id']) && InjectionHandler::hasInjections($_SESSION['id'])) {
            return;
        }
        
        $shoppingCartRepository = new ShoppingCartRepository();
        $view = new View('shop/shoppingCart');
        $view->products = $shoppingCartRepository->getMyProducts($_SESSION['id']);
        $view->display($role);
    }
}
