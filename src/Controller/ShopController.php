<?php

namespace App\Controller;

use App\Repository\ShopRepository;
use App\View\View;

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
        $view->products = $shopRepository->id;
        $view->display($this->returnRole());
    }
}
