<?php

class BoutiqueService
{
    // params db
    private $connection;
    private $table_boutique = 'boutique';
    private $table_agriculteur = 'agriculteur';

    // constructor
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // find all
    public function find_all()
    {

        // init output
        $output = array();

        // query
        $sql = 'SELECT b.*, a.nom, a.prenom, a.num_tel, a.email FROM ' . $this->table_boutique . ' AS b, ' . $this->table_agriculteur . ' AS a
            WHERE b.id_agriculteur = a.id ORDER BY b.id DESC';

        // prepare statement
        $statement = $this->connection->prepare($sql);

        // execute
        $statement->execute();

        // check if boutique empty
        if ($statement->rowCount() > 0) {

            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                array_push(
                    $output,
                    array(
                        'id' => $row['id'],
                        'agriculteur' => array(
                            'id' => $row['id_agriculteur'],
                            'nom' => $row['nom'],
                            'prenom' => $row['prenom'],
                            'num_tel' => $row['num_tel'],
                            'email' => $row['email'],
                        ),
                        'photo_url' => $row['photo_url'],
                        'categorie' => $row['categorie'],
                        'nom_produit' => $row['nom_produit'],
                        'description' => $row['description'],
                        'quantite_totale' => $row['quantite_totale'],
                        'prix_unitaire' => $row['prix_unitaire']
                    )
                );
            }
        } else {
            array_push(
                $output,
                array(
                    'id' => '0'
                )
            );
        }

        // output result
        return $output;
    }

    // find
    public function find($keyword)
    {
        // init output
        $output = array();

        // query
        $sql = 'SELECT b.*, a.nom, a.prenom, a.num_tel, a.email FROM ' . $this->table_boutique . ' b, ' . $this->table_agriculteur . ' a
        WHERE b.id_agriculteur = a.id AND (categorie LIKE :categorie OR nom_produit LIKE :nom_produit OR description LIKE :description)  ORDER BY id DESC';
        // prepre statement
        $statement = $this->connection->prepare($sql);
        // bind data 
        $statement->bindValue(':categorie', $keyword);
        $statement->bindValue(':nom_produit', $keyword);
        $statement->bindValue(':description', $keyword);
        // execute 
        $statement->execute();

        // check if boutique empty
        if ($statement->rowCount() > 0) {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                array_push(
                    $output,
                    array(
                        'id' => $row['id'],
                        'agriculteur' => array(
                            'id' => $row['id_agriculteur'],
                            'nom' => $row['nom'],
                            'prenom' => $row['prenom'],
                            'num_tel' => $row['num_tel'],
                            'email' => $row['email'],
                        ),
                        'photo_url' =>  $row['photo_url'],
                        'categorie' => $row['categorie'],
                        'nom_produit' => $row['nom_produit'],
                        'description' => $row['description'],
                        'quantite_totale' => $row['quantite_totale'],
                        'prix_unitaire' => $row['prix_unitaire']
                    )
                );
            }
        } else {
            array_push(
                $output,
                array(
                    'id' => '0'
                )
            );
        }
        // output result
        return $output;
    }
    // find_by_agriculteur
    public function find_by_agriculteur($id)
    {
        // init output
        $output = array();

        // query
        $sql = 'SELECT b.*, a.nom, a.prenom, a.num_tel, a.email FROM ' . $this->table_boutique . ' AS b, ' . $this->table_agriculteur . ' AS a
        WHERE b.id_agriculteur = a.id AND a.id = :id';

        // prepare statement
        $statement = $this->connection->prepare($sql);

        // bind data
        $statement->bindValue(':id', $id);

        // execute
        $statement->execute();

        // check if boutique empty
        if ($statement->rowCount() > 0) {

            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                array_push(
                    $output,
                    array(
                        'id' => $row['id'],
                        'agriculteur' => array(
                            'id' => $row['id_agriculteur'],
                            'nom' => $row['nom'],
                            'prenom' => $row['prenom'],
                            'num_tel' => $row['num_tel'],
                            'email' => $row['email'],
                        ),
                        'photo_url' => $row['photo_url'],
                        'categorie' => $row['categorie'],
                        'nom_produit' => $row['nom_produit'],
                        'description' => $row['description'],
                        'quantite_totale' => $row['quantite_totale'],
                        'prix_unitaire' => $row['prix_unitaire']
                    )
                );
            }
        } else {
            array_push(
                $output,
                array(
                    'id' => '0'
                )
            );
        }

        // output result
        return $output;
    }


    // find_by_id
    public function find_by_id($id)
    {
         // init output
         $output = array();

         // query
         $sql = 'SELECT b.*, a.nom, a.prenom, a.num_tel, a.email FROM ' . $this->table_boutique . ' AS b, ' . $this->table_agriculteur . ' AS a
             WHERE b.id_agriculteur = a.id AND b.id = :id';
 
         // prepare statement
         $statement = $this->connection->prepare($sql);
 
         // bind data
         $statement->bindValue(':id', $id);
 
         // execute
         $statement->execute();
 
         // check if boutique empty
         if ($statement->rowCount() > 0) {
 
             $row = $statement->fetch(PDO::FETCH_ASSOC);
 
             array_push(
                 $output,
                 array(
                     'id' => $row['id'],
                     'agriculteur' => array(
                         'id' => $row['id_agriculteur'],
                         'nom' => $row['nom'],
                         'prenom' => $row['prenom'],
                         'num_tel' => $row['num_tel'],
                         'email' => $row['email'],
                     ),
                     'photo_url' => $row['photo_url'],
                     'categorie' => $row['categorie'],
                     'nom_produit' => $row['nom_produit'],
                     'description' => $row['description'],
                     'quantite_totale' => $row['quantite_totale'],
                     'prix_unitaire' => $row['prix_unitaire']
                 )
             );
         } else {
             array_push(
                 $output,
                 array(
                     'id' => '0'
                 )
             );
         }
 
         // output result
         return $output;
     }

    // create
    public function create($id_agriculteur, $boutique)
    {
        // init output
        $output = array();

        // query
        $sql = 'INSERT INTO ' . $this->table_boutique .
            ' 
                (id_agriculteur, photo_url, categorie, nom_produit, description, quantite_totale, prix_unitaire) 
                VALUES (:id_agriculteur, :photo_url, :categorie, :nom_produit, :description, :quantite_totale, :prix_unitaire)
            ';

        // prepare statement
        $statement = $this->connection->prepare($sql);

        // bind data
        $statement->bindValue(':id_agriculteur', $id_agriculteur);
        $statement->bindValue(':photo_url', $boutique->getPhotoURL());
        $statement->bindValue(':categorie', $boutique->getCategorie());
        $statement->bindValue(':nom_produit', $boutique->getNomProduit());
        $statement->bindValue(':description', $boutique->getDescription());
        $statement->bindValue(':quantite_totale', $boutique->getQuantiteTotale());
        $statement->bindValue(':prix_unitaire', $boutique->getPrixUnitaire());

        // execute query
        if ($statement->execute()) {
            $output =
                array(
                    'id' => '1'
                );
        } else {
            $output =
                array(
                    'id' => '0'
                );
        }

        // output result
        return $output;
    }

    // edit
    public function edit($boutique)
    {
        // init output
        $output = array();

        // query
        $sql = 'UPDATE ' . $this->table_boutique .
            '
                SET photo_url = :photo_url, categorie = :categorie, nom_produit = :nom_produit, description = :description,
                quantite_totale = :quantite_totale, prix_unitaire = :prix_unitaire WHERE id = :id
            ';

        // prepare statement
        $statement = $this->connection->prepare($sql);

        // bind data
        $statement->bindValue(':photo_url', $boutique->getPhotoURL());
        $statement->bindValue(':categorie', $boutique->getCategorie());
        $statement->bindValue(':nom_produit', $boutique->getNomProduit());
        $statement->bindValue(':description', $boutique->getDescription());
        $statement->bindValue(':quantite_totale', $boutique->getQuantiteTotale());
        $statement->bindValue(':prix_unitaire', $boutique->getPrixUnitaire());
        $statement->bindValue(':id', $boutique->getId());

        // execute query
        if ($statement->execute()) {
            $output =
                array(
                    'id' => '1'
                );
        } else {
            $output =
                array(
                    'id' => '0'
                );
        }

        // output result
        return $output;
    }
    // delete
    public function delete($id)
    {
        //init output
        $output = array();

        //query
        $sql = ' DELETE FROM ' . $this->table_boutique . ' WHERE id = :id';

        //prepare statement
        $statement = $this->connection->prepare($sql);

        //bind data
        $statement->bindValue(':id', $id);

        //execute query
        if ($statement->execute()) {
            $output =
                array(
                    'id' => '1'
                );
        } else {
            $output =
                array(
                    'id' => '0'
                );
        }
        //output result
        return $output;
    }
}
