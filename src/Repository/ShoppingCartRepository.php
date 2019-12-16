<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class ShoppingCartRepository extends Repository
{
    protected $tableName = 'shoppingcart';


    public function addToShoppingCart($userId, $productId) {
        $query = "INSERT INTO $this->tableName (product_id, user_id) VALUES (?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ii', $productId, $userId);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function getMyProducts($userId) {
        $query = "SELECT x.id as id, x.product_id as productId, p.price as price, p.name as name FROM {$this->tableName} as x JOIN product as p on x.product_id=p.id WHERE x.user_id=?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $userId);

        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }
}
