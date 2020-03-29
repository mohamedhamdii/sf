 <?php

    class Boutique
    {
        // fields
        private $id;
        private $agriculteur;
        private $photo_url;
        private $categorie;
        private $nom_produit;
        private $description;
        private $quantite_totale;
        private $prix_unitaire;

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getAgriculteur()
        {
            return $this->agriculteur;
        }

        public function setAgriculteur($agriculteur)
        {
            $this->agriculteur = $agriculteur;
        }

        public function getPhotoURL()
        {
            return $this->photo_url;
        }

        public function setPhotoURL($photo_url)
        {
            $this->photo_url = $photo_url;
        }

        public function getCategorie()
        {
            return $this->categorie;
        }

        public function setCategorie($categorie)
        {
            $this->categorie = $categorie;
        }

        public function getNomProduit()
        {
            return $this->nom_produit;
        }

        public function setNomProduit($nom_produit)
        {
            $this->nom_produit = $nom_produit;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function setDescription($description)
        {
            $this->description = $description;
        }

        public function getQuantiteTotale()
        {
            return $this->quantite_totale;
        }

        public function setQuantiteTotale($quantite_totale)
        {
            $this->quantite_totale = $quantite_totale;
        }

        public function getPrixUnitaire()
        {
            return $this->prix_unitaire;
        }

        public function setPrixUnitaire($prix_unitaire)
        {
            $this->prix_unitaire = $prix_unitaire;
        }
    }
