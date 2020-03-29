<?php

class Agriculteur
{ 
    // table fields
    private $id;
    private $nom;
    private $prenom;
    private $num_tel;
    private $email;
    private $mot_de_passe;

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNumTel()
    {
        return $this->num_tel;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setNumTel($num_tel)
    {
        $this->num_tel = $num_tel;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setMotDePasse($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;
    }
}