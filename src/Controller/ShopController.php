<?php

namespace App\Controller;

use App\Repository\ShopRepository;
use App\View\View;

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
}
