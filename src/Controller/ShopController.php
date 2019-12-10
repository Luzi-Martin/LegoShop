<?php

namespace App\Controller;

use App\Repository\ShopRepository;
use App\View\View;
use App\Validation\PatternHandler;
use App\Validation\InjectionHandler;

/**
 * Siehe Dokumentation im DefaultController.
 */
class ShopController
{
    public function index()
    {
        $shopRepository = new ShopRepository();
        $view = new View('shop/index');
        $view->products = $shopRepository->readAll();
        $view->display();
    }

    public function product()
    {
        if (!isset($_GET['id']) || InjectionHandler::hasInjections($_GET['id'])) {
            echo "Fehler beim Übertragen der Daten";
        } else {
            $shopRepository = new ShopRepository();
            $view = new View('shop/product');
            $view->product = $shopRepository->readById($_GET['id']);
            $view->display();
        }
    }

    public function shoppingCart()
    {
        $view = new View('shop/shoppingCart');
        $view->display();
    }
}
