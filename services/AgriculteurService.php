<?php

class AgriculteurService
{
    // params db
    private $connection;
    private $table = 'agriculteur';

    // constructor
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // authentification
    public function authentification($agriculteur)
    {

        // init output
        $output = array();

        // find by email
        $statement = $this->find_by_email($agriculteur->getEmail());

        if ($statement->rowCount() > 0) {
            // user found
            // get user details
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            if ($row['mot_de_passe'] == $agriculteur->getMotDePasse()) {
                // password correct 
                // push result to output
                $output =
                    array(
                        'id' => $row['id'],
                        'nom' => $row['nom'],
                        'prenom' => $row['prenom'],
                        'num_tel' => $row['num_tel'],
                        'email' => $row['email']
                    );
            } else {
                // password incorrect
                $output =
                    array(
                        'id' => '0'
                    );
            }
        } else {
            // user not found
            $output =
                array(
                    'id' => '-1'
                );
        }

        // output result
        return $output;
    }

    // inscription
    public function inscription($agriculteur)
    {
        // init output
        $output = array();

        // find exist
        if ($this->find_exist($agriculteur)) {
            // user exist
            $output =
                array(
                    'id' => '1'
                );
        } else {

            // query
            $sql = 'INSERT INTO ' . $this->table .
                ' (nom, prenom, num_tel, email, mot_de_passe) VALUES (:nom, :prenom, :num_tel, :email, :mot_de_passe)';

            // prepare statement
            $statement = $this->connection->prepare($sql);

            // bind data
            $statement->bindValue(':nom', $agriculteur->getNom());
            $statement->bindValue(':prenom', $agriculteur->getPrenom());
            $statement->bindValue(':num_tel', $agriculteur->getNumTel());
            $statement->bindValue(':email', $agriculteur->getEmail());
            $statement->bindValue(':mot_de_passe', $agriculteur->getMotDePasse());

            // execute query
            if ($statement->execute()) {
                $output =
                    array(
                        'id' => '2'
                    );
            } else {
                $output =
                    array(
                        'id' => '0'
                    );
            }
        }

        // output result
        return $output;
    }

    // modifier profil
    // modifier mot de passe
    // find by id
    // find by password

    // find exist
    public function find_exist($agriculteur)
    {
        // query
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE email = :email OR num_tel = :num_tel';

        // prepare statement
        $statement = $this->connection->prepare($sql);

        // bind data
        $statement->bindValue(':email', $agriculteur->getEmail());
        $statement->bindValue(':num_tel', $agriculteur->getNumTel());

        // execute query
        $statement->execute();

        if ($statement->rowCount() > 0) {
            return true;
        }

        return false;
    }

    // find by email
    public function find_by_email($email)
    {
        // query
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE email = :email ';

        // prepare statement
        $statement = $this->connection->prepare($sql);

        // bind data
        $statement->bindValue(':email', $email);

        // execute query
        $statement->execute();

        return $statement;
    }
}
