<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emargement";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sélectionner tous les participants depuis la table "participants" avec leur ID
$sql = "SELECT nom, prenom, telephone, email FROM participants";
// $sql = "SELECT * FROM participants";

$result = $conn->query($sql);

$participants = array();

if ($result->num_rows > 0) {
    // Stocker les participants dans un tableau associatif
    $participants = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Fermer la connexion à la base de données
$conn->close();

// Envoyer les participants au format JSON
header('Content-Type: application/json');
echo json_encode($participants);
