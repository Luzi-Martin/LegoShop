<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'user';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem Bcrypt
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     * @param $street Wert für die Spalte street
     * @param $house_nr Wert für die Spalte house_nr
     * @param $location_id Wert für die Spalte location_id
     * 
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($firstName, $lastName, $email, $password, $street, $house_nr, $location_id)
    {
        $false = 0;
        $query = "INSERT INTO $this->tableName (firstName, lastName, email, password, admin, street, house_nr, location_id) VALUES (?, ?, ?, sha2(?,256), ?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssissi', $firstName, $lastName, $email, $password,  $false, $street, $house_nr, $location_id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function getIdByMailAndPassword($email, $password){
        //Query erstellen
        $query = "SELECT * FROM {$this->tableName} WHERE email=? AND password=sha2(?,256)";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $email, $password);
        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();

        // Datenbankressourcen wieder freigeben
        $result->close();

        // Den gefundenen Datensatz zurückgeben
        return $row->id;
    }

    public function getAdminById($id){
        //Query erstellen
        $query = "SELECT * FROM {$this->tableName} WHERE id=?";
        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);
        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();

        // Datenbankressourcen wieder freigeben
        $result->close();

        // Den gefundenen Datensatz zurückgeben
        return $row->admin;

    }

    /*
        Funktion zum Updaten eines Users nach Id
    */
    public function updateById($id, $firstName, $lastName, $email, $street, $house_nr, $location_id) {
        $query = "UPDATE {$this->tableName} SET firstName = ?, lastName = ?, email = ?, street = ?, house_nr = ?, location_id = ? WHERE id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssiii', $firstName, $lastName, $email, $street, $house_nr, $location_id, $id);

        $statement->execute();

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }


    /*
        Funktion zum Updaten eines Passwortes nach Id
    */
    public function updatePwdById($id, $password){
        $query = "UPDATE {$this->tableName} SET password = sha2(?,256) WHERE id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('si',$password,$id);

        $statement->execute();

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}
