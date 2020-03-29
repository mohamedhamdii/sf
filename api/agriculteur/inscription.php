<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../../tools/cummon.php';
include_once '../../config/DBConfig.php';
include_once '../../models/Agriculteur.php';
include_once '../../services/AgriculteurService.php';

// init DB
$dbConfig = new DBConfig();
$db = $dbConfig->open_connection();

// init Agriculteur Service
$service = new AgriculteurService($db);

// get data
$data = json_decode(file_get_contents("php://input"));

// sanitize data
$nom = clean_data($data->nom);
$prenom = clean_data($data->prenom);
$num_tel = clean_data($data->num_tel);
$email = clean_data($data->email);
$mot_de_passe = clean_data($data->mot_de_passe);

// init agriculteur
$agriculteur = new Agriculteur();
$agriculteur->setNom($nom);
$agriculteur->setPrenom($prenom);
$agriculteur->setNumTel($num_tel);
$agriculteur->setEmail($email);
$agriculteur->setMotDePasse(crypt_password($mot_de_passe));

// output
echo json_encode($service->inscription($agriculteur));
