<?php

namespace App\Controller;

use App\Repository\ShopRepository;
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

        if (isset($_POST['add'])) {
            $price = $_POST['lprice'];
            $name = $_POST['lname'];
            $description = $_POST['ldescription'];
            $shopRepository->create($price, $name, $description);
        } /*elseif (isset($_POST['delete'])) {
            $shopRepository->deleteById($_POST['product_id']);
        } elseif (isset($_POST['save'])) {
            $price = $_POST['lprice'];
            $name = $_POST['lname'];
            $description = $_POST['ldescription'];
            $shopRepository->updateById($_POST['product_id'], $price, $name, $shopRepository);
        }*/
        header('Location: /admin/index');
    }
}
