<?php
session_start();
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emargement";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Traitement de la requête d'enregistrement des participants
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];

    // Insérer les données dans la table participants
    $sql = "INSERT INTO participants (nom, prenom, telephone, email) VALUES ('$nom', '$prenom', '$telephone', '$email')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['confirmation_suc'] = " ";
      
    } else {
        
    }
}

// Fermer la connexion à la base de données
$conn->close();
header("Location: index.html");
exit();
?>
 