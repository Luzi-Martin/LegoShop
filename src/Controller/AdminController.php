<?php

namespace App\Controller;

use App\Repository\ShopRepository;
use App\Validation\InjectionHandler;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class AdminController extends Controller
{
    public function index()
    {
        $role = $this->returnRole();
        if ($role == 2) {
            $shopRepository = new ShopRepository();
            $view = new View('admin/index');
            $view->products = $shopRepository->readAll();
            $view->display($this->returnRole());
        } else {
            header('Location: /');
        }
    }

    public function newProduct()
    {
        $role = $this->returnRole();
        if ($role == 2) {
            $shopRepository = new ShopRepository();

            $fields = array($_POST['lprice'], $_POST['lname'], $_POST['ldescription']);

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
        } else {
            header('Location: /');
        }
    }

    public function product()
    {
        $role = $this->returnRole();
        if ($role == 2 && isset($_GET['id'])) {
            $shopRepository = new ShopRepository();
            $view = new View('admin/product');
            $view->product = $shopRepository->readById($_GET['id']);
            $view->display($role);
        } else {
            header('Location:/');
        }
    }

    public function adminProducts()
    {
        $role = $this->returnRole();
        if ($role == 2) {
            $shopRepository = new ShopRepository();
            $view = new View('admin/adminProducts');
            $view->products = $shopRepository->readAll();
            $view->display($role);
        } else {
            header('Location:/');
        }
    }

    public function saveProduct()
    {
        $role = $this->returnRole();
        if ($role == 2) {
            $fields = array($_POST['lprice'], $_POST['lname'], $_POST['ldescription'],$_POST['id']);

            if (InjectionHandler::hasInjections($fields)) {
                return;
            }

            echo $_POST['id']. $_POST['lprice']. $_POST['lname']. $_POST['ldescription']. ' ';

            $shopRepository = new ShopRepository();
            $shopRepository->updateById($_POST['id'], $_POST['lprice'], $_POST['lname'], $_POST['ldescription']);
            
            header('Location:/admin/adminProducts');
        } else {
            header('Location:/');
        }
    }
}
