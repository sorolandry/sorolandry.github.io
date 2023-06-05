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

$sql = "SELECT nom, prenom, telephone, email FROM participants";
// $sql = "SELECT * FROM participants";

$result = $conn->query($sql);

$participants = array();

if ($result->num_rows > 0) {
    // Stockage des participants 
    $participants = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


$conn->close();

header('Content-Type: application/json');
echo json_encode($participants);
