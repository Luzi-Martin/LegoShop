<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class ShopRepository extends Repository
{
    protected $tableName = 'product';


    public function create($price, $name, $description)
    {
        $query = "INSERT INTO $this->tableName (price, name, description) VALUES (?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sss', $price, $name, $description);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function updateById($id, $price, $name, $description) {
        $query = "UPDATE $this->tableName SET  price = ?, name = ?, description = ? WHERE id = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('dssi', $price, $name, $description, $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}
