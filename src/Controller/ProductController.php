<?php

namespace App\Controller;

use App\Repository\ShopRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class ProductController extends Controller
{
    public function index()
    {
        $shopRepository = new ShopRepository();
        $view = new View('shop/index');
        $view->product = $shopRepository->readById($_GET['id']);
        $view->display($_SESSION['role']);
    }

    public function product()
    {
        $shopRepository = new ShopRepository();
        $view = new View('shop/product');
        $view->products = $shopRepository->id;
        $view->display($this->returnRole());
    }
}
