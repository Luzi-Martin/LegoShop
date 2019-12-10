<?php

namespace App\Controller;

use App\Repository\ShopRepository;
use APP\Validation\InjectionHandler;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class AdminController extends Controller
{
    public function index()
    {
        $shopRepository = new ShopRepository();
        $view = new View('admin/index');
        $view->products = $shopRepository->readAll();
        $view->display($this->returnRole());
    }

    public function newProduct()
    {
        $shopRepository = new ShopRepository();

        $fields = array( $_POST['lprice'], $_POST['lname'],$_POST['ldescription']);

            if (InjectionHandler::hasInjections($fields)) {
                return;
            }

        if (isset($_POST['add'])) {
            $price = $_POST['lprice'];
            $name = $_POST['lname'];
            $description = $_POST['ldescription'];
            $shopRepository->create($price, $name, $description);
        }
        header('Location: /admin/index');
    }
}
