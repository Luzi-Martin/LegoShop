<?php

namespace App\Controller;

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
        $shopRepository = new ShopRepository();
        $view = new View('shop/product');
        $view->products = $shopRepository->readById($_GET['id']);
        $view->display($this->returnRole());
    }
}
