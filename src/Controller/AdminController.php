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

    /* index()
        zeigt das erfassen eines Neuen Produktes an. Fals der Benutzer kein Admin ist, wird er auf die HomePage geleitet.
    */
    public function index()
    {
        $role = $this->returnRole();
        if ($role == 2) {
            $view = new View('admin/index');
            $view->display($role);
        } else {
            header('Location: /');
        }
    }

    /*  newProduct()
        Funktion zum Erfassen eines neuen Artikels. Benötigt das ShopRepository um zu erstellen. 
    */
    public function newProduct()
    {
        $role = $this->returnRole();
        if ($role == 2) {
            $shopRepository = new ShopRepository();

            $fields = array($_POST['lprice'], $_POST['lname'], $_POST['ldescription']);

            if (InjectionHandler::hasInjections($fields)) {
                header('Location:/');
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

    /*  product()
        Funktion zum Anzeigen eines einzelnen Produktes.
    */

    public function product()
    {
        $role = $this->returnRole();
        if ($role == 2 && isset($_GET['id'])) {
            $shopRepository = new ShopRepository();
            $view = new View('admin/product');
            $product = $shopRepository->readById($_GET['id']);
            if(!isset($product)) {
                header('Location:/admin/adminProducts');
                return;
            }
            $view->product = $product;
            $view->display($role);
        } else {
            header('Location:/');
        }
    }

    /*  adminProducts()
        Funktion zum darstellen der Produkte als Admin
    */

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

    /*  saveProduct()
        Funktion zum speichern eines Produktes als Admin.
    */

    public function saveProduct()
    {
        $role = $this->returnRole();
        if ($role == 2) {
            $fields = array($_POST['lprice'], $_POST['lname'], $_POST['ldescription'],$_POST['id']);

            if (InjectionHandler::hasInjections($fields)) {
                header('Location:/');
                return;
            }

            $shopRepository = new ShopRepository();
            $shopRepository->updateById($_POST['id'], $_POST['lprice'], $_POST['lname'], $_POST['ldescription']);
            
            header('Location:/admin/adminProducts');
        } else {
            header('Location:/');
        }
    }

    /*  delete()
        Funktion zum löschen eines Produktes als Admin.
    */

    public function delete() {
        $role = $this->returnRole();

        if ($role == 2 && isset($_POST['id'])) {
            if (InjectionHandler::hasInjections($_POST['id'])) {
                header('Location:/');
                return;
            }

            $shopRepository = new ShopRepository();
            $shopRepository->deleteById($_POST['id']);
            header('Location:/admin/adminProducts');
        }
    }
}
